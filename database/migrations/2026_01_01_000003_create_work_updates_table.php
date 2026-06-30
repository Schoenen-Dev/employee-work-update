<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('work_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->text('morning_work');
            $table->text('evening_work')->nullable();
$table->json('file_paths')->nullable();
$table->json('file_names')->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'date']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('work_updates');
    }
};