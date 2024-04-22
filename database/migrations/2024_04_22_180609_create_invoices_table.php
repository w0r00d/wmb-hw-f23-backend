<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Customer_Id');
            $table->foreign('Customer_Id')->references('id')->on('customers')->onDelete('cascade');
            $table->date('Date');
            $table->decimal('Total', 8, 2);
            $table->string('CreditCard');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
