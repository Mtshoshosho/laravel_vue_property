<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->string('property_name', 100)
                ->comment('物件名');

            $table->unsignedInteger('year_built')
                ->comment('築年数');

            $table->string('postal_code', 7)
                ->comment('郵便番号');

            $table->string('prefecture', 10)
                ->comment('都道府県');

            $table->string('city', 50)
                ->comment('市区町村');

            $table->string('address1', 50)
                ->comment('市区町村以下');

            $table->string('nearest_station', 100)
                ->comment('最寄駅');

            $table->unsignedInteger('specific_floor')
                ->comment('階');

            $table->unsignedInteger('rent')
                ->comment('賃料');

            $table->unsignedInteger('administration_fee')
                ->comment('管理費');

            $table->unsignedInteger('security_deposit')
                ->comment('敷金');

            $table->unsignedInteger('gratuity_fee')
                ->comment('礼金');

            $table->string('floor_plan', 50)
                ->comment('間取り');

            $table->decimal('exclusive_area', 8, 2)
                ->comment('専有面積');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->dropColumn([
                'property_name',
                'year_built',
                'postal_code',
                'prefecture',
                'city',
                'address1',
                'nearest_station',
                'specific_floor',
                'rent',
                'administration_fee',
                'security_deposit',
                'gratuity_fee',
                'floor_plan',
                'exclusive_area',
            ]);
        });
    }
};
