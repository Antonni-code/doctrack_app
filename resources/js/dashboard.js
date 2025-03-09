import Chart from 'chart.js/auto';
import { Chart as ChartJS, ArcElement, CategoryScale, LinearScale, PointElement, LineElement, BarElement, Title, Tooltip, Legend } from 'chart.js';

// Register the components we need
ChartJS.register(ArcElement, CategoryScale, LinearScale, PointElement, LineElement, BarElement, Title, Tooltip, Legend);

// Modern color palette
const colors = {
    primary: '#3b82f6',    // Blue
    success: '#10b981',    // Green
    warning: '#f59e0b',    // Amber
    danger: '#ef4444',     // Red
    pending: '#8b5cf6',    // Purple
    gray: '#6b7280',       // Gray
    light: '#f3f4f6',      // Light gray background
    dark: '#1f2937',       // Dark text
};

// Chart style defaults
const chartDefaults = {
    borderWidth: 0,        // No borders for cleaner look
    hoverOffset: 8,        // Slightly expand segments on hover
    borderRadius: 4,       // Rounded corners on bars
};

const fontDefaults = {
    family: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif',
    size: 13,
    weight: '500',
};

// Tooltip style
const tooltipDefaults = {
    backgroundColor: colors.dark,
    titleColor: '#fff',
    bodyColor: '#fff',
    padding: 12,
    cornerRadius: 8,
    boxPadding: 6,
    titleFont: {
        ...fontDefaults,
        weight: 'bold',
    },
    bodyFont: fontDefaults,
    displayColors: true,
    boxWidth: 12,
    boxHeight: 12,
    usePointStyle: true,
    caretSize: 6,
};

document.addEventListener("DOMContentLoaded", function () {
    fetchChartData();
    fetchActivityLogs(); // Fetch logs immediately on page load

    // Auto-refresh activity logs every 5 seconds
    setInterval(fetchActivityLogs, 5000);
});

function fetchChartData() {
    fetch("/dashboard/data")
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then(data => {
            renderDocumentStatusChart(data.documentStatuses);
            renderDocumentsPerOfficeChart(data.documentsPerOffice);
            renderDocumentsPerMonthChart(data.documentsPerMonth);
            renderAvgProcessingTimeChart(data.avgProcessingTime);
            // renderUserActivityChart(data.activityLog);
        })
        .catch(error => {
            console.error("Error fetching chart data:", error);
            showErrorMessage();
        });
}

// function fetchActivityLogs() {
//    fetch('/dashboard/activity-logs', { cache: "no-store" })
//    .then(response => response.json())
//    .then(data => {
//        let tableBody = document.getElementById("activityLogs");
//        tableBody.innerHTML = ""; // Clear existing rows

//        let fragment = document.createDocumentFragment(); // Create a fragment for better performance

//        data.forEach(log => {
//            let row = document.createElement("tr");
//            row.className = "border-b";
//            row.innerHTML = `
//                <td class="border p-2">${log.name}</td>
//                <td class="border p-2">${log.action}</td>
//                <td class="border p-2">${new Date(log.created_at).toLocaleString()}</td>
//            `;
//            fragment.appendChild(row);
//        });

//        tableBody.appendChild(fragment); // Append everything in one go
//    })
//    .catch(error => console.error("Error loading activity logs:", error));
// }
// Update the fetchActivityLogs function to use the new styling
function fetchActivityLogs() {
   fetch('/dashboard/activity-logs', { cache: "no-store" })
   .then(response => response.json())
   .then(data => {
       let tableBody = document.getElementById("activityLogs");
       tableBody.innerHTML = ""; // Clear existing rows

       let fragment = document.createDocumentFragment(); // Create a fragment for better performance

       data.forEach(log => {
           let row = document.createElement("tr");
           row.className = "bg-white hover:bg-gray-50 transition-colors duration-150";

           // Define action badge color based on action type
           let actionClass = "bg-blue-100 text-blue-800"; // Default
           if (log.action.includes("create") || log.action.includes("add")) {
               actionClass = "bg-green-100 text-green-800";
           } else if (log.action.includes("delete") || log.action.includes("remove")) {
               actionClass = "bg-red-100 text-red-800";
           } else if (log.action.includes("update") || log.action.includes("edit") || log.action.includes("modify")) {
               actionClass = "bg-yellow-100 text-yellow-800";
           } else if (log.action.includes("view") || log.action.includes("read")) {
               actionClass = "bg-indigo-100 text-indigo-800";
           }

           const timestamp = new Date(log.created_at);
           const formattedDate = timestamp.toLocaleDateString();
           const formattedTime = timestamp.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});

           row.innerHTML = `
               <td class="px-4 py-3 whitespace-nowrap">
                   <div class="flex items-center">
                       <div class="h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 mr-3">
                           ${log.name.charAt(0).toUpperCase()}
                       </div>
                       <div class="text-sm font-medium text-gray-900">${log.name}</div>
                   </div>
               </td>
               <td class="px-4 py-3 whitespace-nowrap">
                   <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${actionClass}">
                       ${log.action}
                   </span>
               </td>
               <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                   <div class="flex flex-col">
                       <span>${formattedDate}</span>
                       <span class="text-xs text-gray-400">${formattedTime}</span>
                   </div>
               </td>
           `;
           fragment.appendChild(row);
       });

       tableBody.appendChild(fragment); // Append everything in one go
   })
   .catch(error => {
       console.error("Error loading activity logs:", error);
       let tableBody = document.getElementById("activityLogs");
       tableBody.innerHTML = `
           <tr>
               <td colspan="3" class="px-4 py-6 text-center text-sm text-gray-500">
                   <svg class="mx-auto h-8 w-8 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                   </svg>
                   <p class="mt-2">Unable to load activity logs</p>
               </td>
           </tr>
       `;
   });
}


// Show error message if data fetch fails
function showErrorMessage() {
    const chartContainers = document.querySelectorAll('.relative');
    chartContainers.forEach(container => {
        container.innerHTML = `
            <div class="flex flex-col items-center justify-center h-full">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
                <p class="mt-2 text-gray-500">Unable to load chart data</p>
            </div>
        `;
    });
}

// 📊 1️⃣ Document Status Overview (Doughnut Chart)
function renderDocumentStatusChart(documentStatuses) {
    const ctx = document.getElementById("documentStatusChart");
    if (!ctx) return;

    const statusColors = {
        "Pending": colors.warning,
        "In Progress": colors.primary,
        "Completed": colors.success,
        "Rejected": colors.danger,
        // Add fallbacks for other statuses
        "Draft": colors.gray,
        "On Hold": colors.pending,
    };

    const statuses = Object.keys(documentStatuses);

    new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: statuses,
            datasets: [{
                data: Object.values(documentStatuses),
                backgroundColor: statuses.map(status => statusColors[status] || colors.gray),
                ...chartDefaults,
                borderWidth: 2,
                borderColor: colors.light,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%', // Larger hole for modern look
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        pointStyle: 'circle',
                        padding: 16,
                        font: fontDefaults,
                    }
                },
                tooltip: {
                    ...tooltipDefaults,
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            const total = context.dataset.data.reduce((acc, val) => acc + val, 0);
                            const percentage = Math.round((value / total) * 100);
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });
}

// 📊 2️⃣ Documents Per Office (Bar Chart)
function renderDocumentsPerOfficeChart(documentsPerOffice) {
    const ctx = document.getElementById("documentsPerOfficeChart");
    if (!ctx) return;

    // Convert data structure
    const labels = documentsPerOffice.map(item => item.office_code);
    const totals = documentsPerOffice.map(item => item.total);
    const officeNames = documentsPerOffice.map(item => item.office_name);

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [{
                label: "Documents Processed",
                data: totals,
                backgroundColor: colors.primary,
                ...chartDefaults,
                borderRadius: 6,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    ...tooltipDefaults,
                    callbacks: {
                        title: function(tooltipItems) {
                            const index = tooltipItems[0].dataIndex;
                            return officeNames[index];
                        },
                        label: function(context) {
                            return `Documents: ${context.raw}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                    },
                    ticks: {
                        font: fontDefaults,
                        color: colors.dark,
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: colors.light,
                        drawBorder: false,
                    },
                    ticks: {
                        font: fontDefaults,
                        color: colors.dark,
                        padding: 10,
                        precision: 0, // Only show whole numbers
                    }
                }
            }
        }
    });
}

// 📊 3️⃣ Documents Per Month (Line Chart)
function renderDocumentsPerMonthChart(documentsPerMonth) {
    const ctx = document.getElementById("documentsPerMonthChart");
    if (!ctx) return;

    // Convert numeric months to actual month names
    const monthNames = [
        "Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ];
    const labels = Object.keys(documentsPerMonth).map(month => monthNames[month - 1]);

    // Simplified gradient fill
    const gradient = ctx.getContext("2d").createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, hexToRgba(colors.success, 0.3));
    gradient.addColorStop(1, hexToRgba(colors.success, 0));

    new Chart(ctx, {
        type: "line",
        data: {
            labels: labels,
            datasets: [{
                label: "Documents",
                data: Object.values(documentsPerMonth),
                borderColor: colors.success,
                backgroundColor: gradient,
                fill: true,
                tension: 0.2, // Slight curve
                pointRadius: 4,
                pointBackgroundColor: colors.success,
                pointBorderColor: 'white',
                pointBorderWidth: 2,
                pointHoverRadius: 6,
                pointHoverBackgroundColor: colors.success,
                pointHoverBorderWidth: 2,
                pointHoverBorderColor: 'white',
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    ...tooltipDefaults,
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                    },
                    ticks: {
                        font: fontDefaults,
                        color: colors.dark,
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: colors.light,
                        drawBorder: false,
                    },
                    ticks: {
                        font: fontDefaults,
                        color: colors.dark,
                        padding: 10,
                        precision: 0, // Only show whole numbers
                    }
                }
            }
        }
    });
}

// 📊 4️⃣ Average Processing Time (Horizontal Bar Chart)
function renderAvgProcessingTimeChart(avgProcessingTime) {
    const ctx = document.getElementById("avgProcessingTimeChart");
    if (!ctx) return;

    // Convert data structure
    const labels = avgProcessingTime.map(item => item.office_code);
    const avgDays = avgProcessingTime.map(item => item.avg_days);
    const officeNames = avgProcessingTime.map(item => item.office_name);

    // Create color array based on processing time (red for longer times)
    const barColors = avgDays.map(days => {
        // Dynamic coloring based on processing time
        if (days < 3) return colors.success; // Fast processing
        if (days < 7) return colors.warning; // Medium processing
        return colors.danger; // Slow processing
    });

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [{
                label: "Days",
                data: avgDays,
                backgroundColor: barColors,
                ...chartDefaults,
                borderRadius: 6,
            }],
        },
        options: {
            indexAxis: 'y', // Horizontal bars
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    ...tooltipDefaults,
                    callbacks: {
                        title: function(tooltipItems) {
                            const index = tooltipItems[0].dataIndex;
                            return officeNames[index];
                        },
                        label: function(context) {
                            const days = context.raw;
                            return `Average: ${days.toFixed(1)} days`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    grid: {
                        color: colors.light,
                        drawBorder: false,
                    },
                    ticks: {
                        font: fontDefaults,
                        color: colors.dark,
                        padding: 10,
                        callback: function(value) {
                            return value + " days";
                        }
                    }
                },
                y: {
                    grid: {
                        display: false,
                    },
                    ticks: {
                        font: fontDefaults,
                        color: colors.dark,
                    }
                }
            }
        }
    });
}

// function renderUserActivityChart(activityLog) {
//    const ctx = document.getElementById("userActivityChart");
//    if (!ctx) return;
//    new Chart(ctx, {
//        type: "bar",
//        data: {
//            labels: Object.keys(activityLog),
//            datasets: [{
//                label: "User Actions",
//                data: Object.values(activityLog),
//                backgroundColor: "#8e44ad",
//            }],
//        },
//    });
// }

// Helper function to convert hex colors to rgba for gradients
function hexToRgba(hex, alpha = 1) {
    // Convert hex to RGB
    let r = parseInt(hex.slice(1, 3), 16);
    let g = parseInt(hex.slice(3, 5), 16);
    let b = parseInt(hex.slice(5, 7), 16);

    // Return rgba value
    return `rgba(${r}, ${g}, ${b}, ${alpha})`;
}
