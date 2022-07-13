<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUsersTable extends Migration {
        /**
         * * Run the migrations.
         * @return void
         */
        public function up () {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id_user')->unique();
                $table->string('email')->unique();
                $table->string('password');
                $table->string('first_name');
                $table->string('slug');
                $table->string('benchmark')->nullable();
                $table->string('direction')->nullable();
                $table->string('phone')->nullable();
                $table->bigInteger('candidate_number')->unique()->nullable();
                $table->string('last_name')->nullable();
                $table->string('alias')->nullable();
                $table->string('cbu')->nullable();
                $table->string('cuil')->nullable();
                $table->unsignedInteger('id_role')->default(0);
                $table->unsignedInteger('id_created_by')->nullable()->default(1);
                $table->unsignedInteger('id_category')->nullable();
                $table->unsignedInteger('id_country')->nullable();
                $table->unsignedInteger('id_level')->nullable();
                $table->unsignedInteger('id_certificate')->nullable();
                $table->date('birth_date')->nullable();
                $table->timestamp('email_verified_at')->nullable();
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
                $table->rememberToken();
            });
        }

        /**
         * * Reverse the migrations.
         * @return void
         */
        public function down () {
            Schema::dropIfExists('users');
        }
    }