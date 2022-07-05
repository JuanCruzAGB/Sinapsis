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
    }