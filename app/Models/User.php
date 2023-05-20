<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password', 'type', 'username', 'phone', 'image','Company_Name',
        'Company_Address', 'Company_Address_2', 'City', 'Postal_code', 'Country', 'Company_email',
        'national_number', 'date_of_birth', 'Job_number', 'Date_of_employee_registration_in_system',
        'Date_of_employee_registration_in_company', 'Beginning_work', 'finished_work','department_id',
        'status', 'total_salary', 'partial_salary', 'bonuses', 'overtime', 'manger_id','group_id'
    ];

    public function manger()
    {
        return $this->hasMany(User::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'manger_id');
    }

    public function vacation()
    {
        return $this->hasMany(Vacation::class, 'id');
    }

    public function section()
    {
        return $this->hasMany(Department::class, 'company_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'id', 'department_id');
    }

    public function debt()
    {
        return $this->hasMany(Debt::class, 'employee_id', 'id');
    }

    public function expens()
    {
        return $this->hasMany(Expenses::class, 'employee_id', 'id');
    }

    public function salary()
    {
        return $this->hasOne(Salary::class, 'employee_id', 'id');
    }

    public function customer()
    {
        return $this->hasMany(Customer::class, 'company_id', 'id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'company_id', 'id');
    }

    public function task()
    {
        return $this->hasMany(Task::class);
    }

    public function project()
    {
        return $this->hasMany(Project::class, 'user_id', 'id');
    }

    public function projectsupervisor()
    {
        return $this->hasMany(Project::class, 'supervisor_id', 'id');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
