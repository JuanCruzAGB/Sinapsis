<?php
    namespace App\Models;

    use App\Models\Evaluation;
    use App\Models\User;
    use Cviebrock\EloquentSluggable\Sluggable;
    use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
    use Illuminate\Database\Eloquent\Model;

    class Exam extends Model {
        use Sluggable, SluggableScopeHelpers;

        /**
         * * User primary key.
         * @var string
         */
        protected $primaryKey = 'id_exam';

        /**
         * * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = [
            'id_type',
            'name',
            'scheduled_at',
            'slug',
        ];

        /**
         * * The attributes that should be hidden for arrays.
         * @var array
         */
        protected $hidden = [
            // 
        ];

        /**
         * * The attributes that should be cast to native types.
         * @var array
         */
        protected $casts = [
            'deleted_at' => 'datetime',
            'scheduled_at' => 'datetime',
        ];

        /**
         * * Get the Exam's Type.
         * @return object
         */
        public function getTypeAttribute () {
            switch ($this->id_type) {
                case 1:
                    return (object) [
                        'id_type' => 1,
                        'name' => 'Virtual',
                        'slug' => 'virtual',
                    ];

                case 2:
                    return (object) [
                        'id_type' => 2,
                        'name' => 'Face to face',
                        'slug' => 'face-to-face',
                    ];
            }
        }

        /**
         * * Get all of the Evaluations for the Exam
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function evaluations () {
            return $this->hasMany(Evaluation::class, 'id_exam', 'id_exam');
        }

        /**
         * * Get all of the User for the Exam.
         * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
         */
        public function users () {
            return $this->hasManyThrough(User::class, Evaluation::class, 'id_exam', 'id_exam', 'id_user', 'id_user');
        }

        /**
         * * The Sluggable configuration for the Model.
         * @return array
         */
        public function sluggable () {
            return [
                'slug' => [
                    'source'	=> 'name',
                    'onUpdate'	=> true,
                ],
            ];
        }

        /**
         * * Scope a query to only include Exams where match slug.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param string $slug
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeBySlug ($query, string $slug) {
            return $query->where('slug', $slug)->first();
        }
    }