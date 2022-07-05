<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateEvaluationsTable extends Migration {
        /**
         * * Run the migrations.
         * @return void
         */
        public function up () {
            Schema::create('evaluations', function (Blueprint $table) {
                $table->increments('id_evaluation');
                $table->unsignedInteger('id_user');
                $table->unsignedInteger('id_exam');
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            });
        }

        /**
         * * Reverse the migrations.
         * @return void
         */
        public function down () {
            Schema::dropIfExists('evaluations');
        }
    }