<?php
namespace App\ViewModels;

use Illuminate\Http\Request;

interface IPaymentTermModel
{
    public function getAllPaymentTerms(Request $request);
    public function getPaymentTermById($id);
    public function addPaymentTerm(Request $request);
    public function updatePaymentTerm(Request $request,$id);
    public function delete($id);
}