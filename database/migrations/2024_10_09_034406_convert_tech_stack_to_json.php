<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Adiciona uma nova coluna temporária
        Schema::table('projects', function (Blueprint $table) {
            $table->json('tech_stack_temp')->nullable();
        });

        // Copia os dados da coluna antiga para a nova coluna
        $projects = DB::table('projects')->get();
        foreach ($projects as $project) {
            if ($project->tech_stack) {
                $techStackArray = explode(',', $project->tech_stack); // Ajuste isso se necessário
                DB::table('projects')->where('id', $project->id)->update(['tech_stack_temp' => json_encode($techStackArray)]);
            }
        }

        // Remove a coluna antiga
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('tech_stack');
        });

        // Renomeia a nova coluna para o nome original
        Schema::table('projects', function (Blueprint $table) {
            $table->renameColumn('tech_stack_temp', 'tech_stack');
        });
    }

    public function down(): void
    {
        // Para reverter, você pode adicionar a coluna antiga de volta se necessário
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'tech_stack')) {
                $table->dropColumn('tech_stack');
            }
            $table->text('tech_stack')->nullable(); // Opcional, se quiser reverter
        });
    }
};
