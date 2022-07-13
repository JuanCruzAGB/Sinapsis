<?php
    namespace App\Models;

    use App\Models\Evaluation;
    use App\Models\Exam;
    use Cviebrock\EloquentSluggable\Sluggable;
    use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;

    class User extends Authenticatable {
        use Notifiable, Sluggable, SluggableScopeHelpers;

        /**
         * * User primary key.
         * @var string
         */
        protected $primaryKey = 'id_user';

        /**
         * * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = [
            'alias',
            'benchmark',
            'birth_date',
            'direction',
            'candidate_number',
            'cbu',
            'cuil',
            'email',
            'first_name',
            'id_category',
            'id_certificate',
            'id_country',
            'id_created_by',
            'id_level',
            'id_role',
            'last_name',
            'password',
            'phone',
            'slug',
        ];

        /**
         * * The attributes that should be hidden for arrays.
         * @var array
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        /**
         * * The attributes that should be cast to native types.
         * @var array
         */
        protected $casts = [
            'birth_date' => 'date',
            'email_verified_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];

        /**
         * * Get the User's Category.
         * @return object
         */
        public function getCategoryAttribute () {
            switch ($this->id_category) {
                case 1:
                    return (object) [
                        'id_category' => 1,
                        'name' => 'Basis',
                        'slug' => 'basis',
                    ];

                case 2:
                    return (object) [
                        'id_category' => 2,
                        'name' => 'Affiliated',
                        'slug' => 'affiliated',
                    ];

                case 3:
                    return (object) [
                        'id_category' => 3,
                        'name' => 'Member',
                        'slug' => 'member',
                    ];

                case 4:
                    return (object) [
                        'id_category' => 4,
                        'name' => 'Center',
                        'slug' => 'center',
                    ];

                case 5:
                    return (object) [
                        'id_category' => 5,
                        'name' => 'Inbuilt',
                        'slug' => 'inbuilt',
                    ];
            }
        }

        /**
         * * Get the User's Country.
         * @return object
         */
        public function getCountryAttribute () {
            switch ($this->id_country) {
                case 1:
                    return (object) [
                        'id_country' => 1,
                        'name' => 'Argentine',
                        'slug' => 'argentine',
                    ];

                case 2:
                    return (object) [
                        'id_country' => 2,
                        'name' => 'Uruguayan',
                        'slug' => 'uruguayan',
                    ];

                case 3:
                    return (object) [
                        'id_country' => 3,
                        'name' => 'European',
                        'slug' => 'european',
                    ];

                case 4:
                    return (object) [
                        'id_country' => 4,
                        'name' => 'North American',
                        'slug' => 'north-american',
                    ];
            }
        }

        /**
         * * Get the User's full name.
         * @return string
         */
        public function getFullNameAttribute () {
            return $this->first_name . ' ' . $this->last_name;
        }

        /**
         * * Get the User's Role.
         * @return object
         */
        public function getRoleAttribute () {
            switch ($this->id_role) {
                case 0:
                    return (object) [
                        'id_role' => 0,
                        'name' => 'Candidate',
                        'slug' => 'candidate',
                        'actions' => [
                            'pay',
                        ],
                    ];

                case 1:
                    return (object) [
                        'id_role' => 1,
                        'name' => 'Associated',
                        'slug' => 'associated',
                        'actions' => [
                            'create' => [
                                'candidate',
                            ],
                            'read' => [
                                'candidate',
                                'profile',
                            ],
                            'update' => [
                                'candidate',
                                'profile',
                            ],
                            'pay',
                        ],
                    ];

                case 2:
                    return (object) [
                        'id_role' => 2,
                        'name' => 'Corrector',
                        'slug' => 'corrector',
                        'actions' => [
                            'grade',
                        ],
                    ];

                case 3:
                    return (object) [
                        'id_role' => 2,
                        'name' => 'Administrator',
                        'slug' => 'administrator',
                        'actions' => [
                            'create' => [
                                'administrator',
                                'associated',
                                'candidate',
                                'corrector',
                                'exam',
                            ],
                            'read' => [
                                'administrator',
                                'associated',
                                'candidate',
                                'corrector',
                                'exam',
                            ],
                            'update' => [
                                'administrator',
                                'associated',
                                'candidate',
                                'corrector',
                                'currency',
                                'exam',
                                'profile',
                            ],
                            'delete' => [
                                'administrator',
                                'associated',
                                'candidate',
                                'corrector',
                                'exam',
                            ],
                            'grade',
                            'pay',
                        ],
                    ];
            }
        }

        /**
         * * Get the creator that owns the User.
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function creator () {
            return $this->belongsTo(User::class, 'id_created_by', 'id_user');
        }

        /**
         * * Get all of the Users for the User.
         * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
         */
        public function users () {
            return $this->hasMany(User::class, 'id_created_by', 'id_user');
        }

        /**
         * * Get all of the Evaluations for the User.
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function evaluations () {
            return $this->hasMany(Evaluation::class, 'id_user', 'id_user');
        }

        /**
         * * Get all of the Exam for the User.
         * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
         */
        public function exams () {
            return $this->hasManyThrough(Exam::class, Evaluation::class, 'id_user', 'id_user', 'id_exam', 'id_exam');
        }

        /**
         * * The Sluggable configuration for the Model.
         * @return array
         */
        public function sluggable () {
            return [
                'slug' => [
                    'onUpdate' => true,
                    'source' => 'name',
                ],
            ];
        }

        /**
         * * Scope a query to only include Users where match slug.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param string $slug
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeBySlug ($query, string $slug) {
            return $query->where('slug', $slug)->first();
        }

        /**
         * * Scope a query to only include Users where match role.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param string $role
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeByRole ($query, string $role) {
            switch ($role) {
                case 'administrator':
                    $id_role = 3;
                    break;

                case 'corrector':
                    $id_role = 2;
                    break;

                case 'associated':
                    $id_role = 1;
                    break;

                case 'candidate':
                    $id_role = 0;
                    break;
            }

            return $query->where('id_role', $id_role);
        }

        /**
         * * Scope a query to only include Users where match id_role.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_role
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeByIdRole ($query, int $id_role) {
            return $query->where('id_role', $id_role);
        }

        /**
         * * Scope a query to only include Users where match id_role = 3.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_role
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeAdministrators ($query) {
            return $query->where('id_role', 3);
        }

        /**
         * * Scope a query to only include Users where match id_role = 2.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_role
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeCorrectors ($query) {
            return $query->where('id_role', 2);
        }

        /**
         * * Scope a query to only include Users where match id_role = 1.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_role
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeAssociates ($query) {
            return $query->where('id_role', 1);
        }

        /**
         * * Scope a query to only include Users where match id_role = 0.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_role
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeCandidates ($query) {
            return $query->where('id_role', 0);
        }

        /**
         * * Scope a query to only include Users where match id_category.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_category
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeByIdCategory ($query, int $id_category) {
            return $query->where('id_category', $id_category);
        }

        /**
         * * Scope a query to only include Users where match id_category = 1.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_category
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeBasis ($query) {
            return $query->where('id_category', 1);
        }

        /**
         * * Scope a query to only include Users where match id_category = 2.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_category
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeAffiliates ($query) {
            return $query->where('id_category', 2);
        }

        /**
         * * Scope a query to only include Users where match id_category = 3.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_category
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeMembers ($query) {
            return $query->where('id_category', 3);
        }

        /**
         * * Scope a query to only include Users where match id_category = 4.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_category
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeCenters ($query) {
            return $query->where('id_category', 4);
        }

        /**
         * * Scope a query to only include Users where match id_category = 5.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_category
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeInbuilts ($query) {
            return $query->where('id_category', 5);
        }

        /**
         * * Scope a query to only include Users where match id_country.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_country
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeByIdCountry ($query, int $id_country) {
            return $query->where('id_country', $id_country);
        }

        /**
         * * Scope a query to only include Users where match id_country = 1.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_country
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeArgentinias ($query) {
            return $query->where('id_country', 1);
        }

        /**
         * * Scope a query to only include Users where match id_country = 2.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_country
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeUruguayans ($query) {
            return $query->where('id_country', 2);
        }

        /**
         * * Scope a query to only include Users where match id_country = 3.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_country
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeNorthAmericans ($query) {
            return $query->where('id_country', 3);
        }

        /**
         * * Scope a query to only include Users where match id_country = 4.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_country
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeEuropeans ($query) {
            return $query->where('id_country', 4);
        }

        /**
         * * Scope a query to only include Users where match creator.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_user
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeCreatedBy ($query, int $id_user) {
            return $query->where('id_created_by', $id_user);
        }
    }