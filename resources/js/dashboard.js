import Chart from 'chart.js/auto';

document.addEventListener("DOMContentLoaded", function () {
    fetchChartData();
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
        })
        .catch(error => {
            console.error("Error fetching chart data:", error);
        });
}

// 📊 1️⃣ Document Status Overview (Pie Chart)
function renderDocumentStatusChart(documentStatuses) {
    const ctx = document.getElementById("documentStatusChart");
    if (!ctx) return;
    new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: Object.keys(documentStatuses),
            datasets: [{
                data: Object.values(documentStatuses),
                backgroundColor: ["#f39c12", "#3498db", "#2ecc71", "#e74c3c"],
            }],
        },
    });
}

// 📊 2️⃣ Documents Processed Per Office (Bar Chart)
function renderDocumentsPerOfficeChart(documentsPerOffice) {
    const ctx = document.getElementById("documentsPerOfficeChart");
    if (!ctx) return;
    new Chart(ctx, {
        type: "bar",
        data: {
            labels: Object.keys(documentsPerOffice),
            datasets: [{
                label: "Documents Processed",
                data: Object.values(documentsPerOffice),
                backgroundColor: "#3498db",
            }],
        },
    });
}

// 📊 3️⃣ Documents Per Month (Line Chart)
function renderDocumentsPerMonthChart(documentsPerMonth) {
    const ctx = document.getElementById("documentsPerMonthChart");
    if (!ctx) return;
    new Chart(ctx, {
        type: "line",
        data: {
            labels: Object.keys(documentsPerMonth),
            datasets: [{
                label: "Documents Received",
                data: Object.values(documentsPerMonth),
                borderColor: "#2ecc71",
                fill: false,
            }],
        },
    });
}

// 📊 4️⃣ Average Processing Time (Bar Chart)
function renderAvgProcessingTimeChart(avgProcessingTime) {
    const ctx = document.getElementById("avgProcessingTimeChart");
    if (!ctx) return;
    new Chart(ctx, {
        type: "bar",
        data: {
            labels: Object.keys(avgProcessingTime),
            datasets: [{
                label: "Avg Processing Time (Days)",
                data: Object.values(avgProcessingTime),
                backgroundColor: "#e74c3c",
            }],
        },
    });
}
