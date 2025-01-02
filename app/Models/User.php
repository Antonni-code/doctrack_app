<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
   use HasApiTokens;

   /** @use HasFactory<\Database\Factories\UserFactory> */
   use HasApiTokens;
   use HasFactory;
   use HasProfilePhoto;
   use Notifiable;
   use TwoFactorAuthenticatable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
      'name',
      'email',
      'password',
      'office_id',
      'designation',
      'role',
   ];

   /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
   protected $hidden = [
      'password',
      'remember_token',
      'two_factor_recovery_codes',
      'two_factor_secret',
   ];

   /**
    * The accessors to append to the model's array form.
    *
    * @var array<int, string>
    */
   protected $appends = [
      'profile_photo_url',
   ];

   /**
    * Get the attributes that should be cast.
    *
    * @return array<string, string>
    */
   protected function casts(): array
   {
      return [
         'email_verified_at' => 'datetime',
         'password' => 'hashed',
      ];
   }

   public function scopeActive($query)
   {
      return $query->where('active', 1)->where('excluded', 0);
   }

   public function scopeExcluded($query)
   {
      return $query->where('excluded', 1);
   }

   // A user belongs to an office
   public function office()
   {
      return $this->belongsTo(Office::class);
   }

   // Relationship for documents sent by the user (sender)
   public function sentDocuments()
   {
      return $this->hasMany(Document::class, 'sender_id');
   }

   // Relationship for documents received by the user (recipient)
   public function receivedDocuments()
   {
      return $this->belongsToMany(Document::class, 'document_recipients', 'recipient_id', 'document_id')
         ->withTimestamps(); // Includes timestamps for created_at/updated_at
   }

   // Relationship to documents (as recipient)
   public function documents()
   {
      return $this->belongsToMany(Document::class, 'document_recipients');
   }
}
