<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateExamsTable extends Migration {
        /**
         * * Run the migrations.
         * @return void
         */
        public function up () {
            Schema::create('exams', function (Blueprint $table) {
                $table->increments('id_exam');
                $table->string('name');
                $table->string('slug');
                $table->unsignedInteger('id_type');
                $table->unsignedInteger('id_created_by')->nullable()->default(1);
                $table->timestamp('scheduled_at');
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            });
        }

        /**
         * * Reverse the migrations.
         * @return void
         */
        public function down () {
            Schema::dropIfExists('exams');
        }
    }