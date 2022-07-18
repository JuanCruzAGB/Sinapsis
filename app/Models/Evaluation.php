<?php
    namespace App\Models;

    use App\Models\Exam;
    use App\Models\User;
    use Illuminate\Database\Eloquent\Model;

    class Evaluation extends Model {
        /**
         * * User primary key.
         * @var string
         */
        protected $primaryKey = 'id_evaluation';

        /**
         * * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = [
            'id_exam',
            'id_user',
            'qualification',
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
        ];

        /**
         * * Get the Exam that owns the Evaluation.
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function exam () {
            return $this->belongsTo(Exam::class, 'id_exam', 'id_exam');
        }

        /**
         * * Get the User that owns the Evaluation.
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function user () {
            return $this->belongsTo(User::class, 'id_user', 'id_user');
        }

        /**
         * * Scope a query to only include Evaluations where qualification is null.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeNotQualified ($query) {
            return $query->whereNull('qualification');
        }

        /**
         * * Scope a query to only include Evaluations where qualification is not null.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeQualified ($query) {
            return $query->whereNotNull('qualification');
        }

        /**
         * * Scope a query to only include Evaluations where qualification is not null.
         * @param \Illuminate\Database\Eloquent\Builder $query
         * @param int $id_user
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function scopeCreatedBy ($query, int $id_user) {
            return $query->join('exams', 'exams.id_exam', '=', 'evaluations.id_exam')
                ->select('evaluations.*')
                ->where('exams.id_created_by', $id_user);
        }
    }