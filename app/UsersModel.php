<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class UsersModel extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'users_table';
    protected $fillable = [
        'nom', 'prenom', 'email', 'password', 'id_role'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(RoleModel::class, 'id_role');
    }
    public function producteur(){
        return $this->hasMany(ProducteursModel::class, 'id_user');
    }

    public function commandes(){
        return $this->belongsToMany(CommandesModel::class, 'commande_has_confiture', 'id_user', 'id_commande');
    }
}
