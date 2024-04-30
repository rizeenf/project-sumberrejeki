<?php

namespace App\Http\Controllers;

// USED MODEL
use App\Models\Log;
use App\Models\mBranch;
use App\Models\mJabatan;
use App\Models\mCategoryProduct as CP;
use App\Models\mBrandProduct as BP;
use App\Models\mSubBrandProduct as SBP;
use App\Models\mProduct;
use App\Models\mDisplay as DP;
use App\Models\mCustomer;
use App\Models\MOwner;
use App\Models\mStaff;
use App\Models\User;
use App\Models\tVisit;
use App\Models\dtCustVisit;
use App\Models\dtOutletVisit;
use App\Models\mFoto;
use App\Models\mScheduleVisit;
use App\Models\mScheduleVisitDetail as SD;

// CUSTOM PLUGIN
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    // $now = date('Y-m-d H:i:s');

    // FUNCTION LOG
    public function addToLog(Request $request, $activity, $user){
        $log = [];
        $log['activity'] = $activity;
        $log['url'] = $request->fullUrl();
        $log['method'] = $request->method();
        $log['ip_address'] = $request->ip();
        $log['agent'] = $request->header('user-agent');
        $log['user_id'] = $user;
        Log::create($log);
    }

    public function listLog(){
        return Log::select(
            'logs.id as id',
            'logs.activity as activity',
            'users.name as name',
            'logs.created_at as created_at'
        )
        ->join('users', 'logs.user_id', '=', 'users.id')
        ->orderBy('created_at', 'DESC')
        ->get();
    }

    // FUNCTION BRANCH
    public function listAllBranch(){
        return mBranch::latest()->get();
    }

    public function searchBranch($search){
        return mBranch::latest()
            ->where('name', 'LIKE', '%'.$search.'%')
            ->get();
    }

    public function exceptBranchId($id){
        return mBranch::latest()
            ->where('id', '!=', $id)
            ->get();
    }

    public function statusBranch($status){
        return mBranch::latest()
            ->where('status', '=', $status)
            ->get();
    }

    public function trashBranch($disabled){
        return mBranch::latest()
            ->where('disabled', '=', $disabled)
            ->get();
    }

    public static function detailBranch($id){
        return mBranch::find($id);
    }

    public function addBranch($code, $name, $notes, $user){
        return mBranch::create([
            'code' => $code,
            'name' => $name,
            'notes' => $notes,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user
        ]);
    }

    public function updateBranch($id, $name, $notes, $user){
        return mBranch::findOrFail($id)->update([
            'name' => $name,
            'notes' => $notes,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function activeBranch($id, $user){
        return mBranch::findOrFail($id)->update([
            'status' => true,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function nonActiveBranch($id, $user){
        return mBranch::findOrFail($id)->update([
            'status' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deleteTemporaryBranch($id, $user){
        return mBranch::findOrFail($id)->update([
            'disabled' => true,
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $user
        ]);
    }

    public function recoverBranch($id, $user){
        return mBranch::findOrFail($id)->update([
            'disabled' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deletePermanentBranch($id){
        return mBranch::find($id)->delete();
    }

    // FUNCTION CATEGORY PRODUCT
    public function listAllCategory(){
        return CP::latest()->get();
    }

    public function searchCategory($search){
        return CP::latest()
            ->where('name', 'LIKE', '%'.$search.'%')
            ->get();
    }

    public function exceptCategoryId($id){
        return CP::latest()
            ->where('id', '!=', $id)
            ->get();
    }

    public function statusCategory($status){
        return CP::latest()
            ->where('status', '=', $status)
            ->get();
    }

    public function trashCategory($disabled){
        return CP::latest()
            ->where('disabled', '=', $disabled)
            ->get();
    }

    public function detailCategory($id){
        return CP::find($id);
    }

    public function addCategory($name, $user){
        return CP::create([
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user
        ]);
    }

    public function updateCategory($id, $name, $user){
        return CP::findOrFail($id)->update([
            'name' => $name,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function activeCategory($id, $user){
        return CP::findOrFail($id)->update([
            'status' => true,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function nonActiveCategory($id, $user){
        return CP::findOrFail($id)->update([
            'status' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deleteTemporaryCategory($id, $user){
        return CP::findOrFail($id)->update([
            'disabled' => true,
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $user
        ]);
    }

    public function recoverCategory($id, $user){
        return CP::findOrFail($id)->update([
            'disabled' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deletePermanentCategory($id){
        return CP::find($id)->delete();
    }

    // FUNCTION JABATAN
    public function listAllJabatan(){
        return mJabatan::latest()->get();
    }

    public function exceptJabatanId($id){
        return mJabatan::latest()
            ->where('id', '!=', $id)
            ->get();
    }

    public function statusJabatan($status){
        return mJabatan::latest()
            ->where('status', '=', $status)
            ->get();
    }

    public function trashJabatan($disabled){
        return mJabatan::latest()
            ->where('disabled', '=', $disabled)
            ->get();
    }

    public function detailJabatan($id){
        return mJabatan::find($id);
    }

    public function addJabatan($name, $user){
        return mJabatan::create([
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user
        ]);
    }

    public function updateJabatan($id, $name, $user){
        return mJabatan::findOrFail($id)->update([
            'name' => $name,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function activeJabatan($id, $user){
        return mJabatan::findOrFail($id)->update([
            'status' => true,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function nonActiveJabatan($id, $user){
        return mJabatan::findOrFail($id)->update([
            'status' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deleteTemporaryJabatan($id, $user){
        return mJabatan::findOrFail($id)->update([
            'disabled' => true,
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $user
        ]);
    }

    public function recoverJabatan($id, $user){
        return mJabatan::findOrFail($id)->update([
            'disabled' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deletePermanentJabatan($id){
        return mJabatan::find($id)->delete();
    }

    // FUNCTION BRAND
    public function listAllBrand(){
        return BP::select(
                'm_brand_products.id as id', 
                'm_category_products.name as category_produk', 
                'm_brand_products.name as name',
                'm_brand_products.created_at as created_at')
            ->join('m_category_products', 'm_brand_products.category_id', '=', 'm_category_products.id')
            ->latest()
            ->get();
    }

    public function exceptBrandId($id){
        return BP::latest()
            ->where('id', '!=', $id)
            ->get();
    }

    public function searchBrand($search){
        return BP::latest()
            ->where('name', 'LIKE', '%'.$search.'%')
            ->get();
    }

    public function statusBrand($status){
        return BP::select(
                'm_brand_products.id as id', 
                'm_category_products.name as category_produk', 
                'm_brand_products.name as name',
                'm_brand_products.status as status',
                'm_brand_products.created_at as created_at')
            ->join('m_category_products', 'm_brand_products.category_id', '=', 'm_category_products.id')
            ->latest()
            ->where('m_brand_products.status', '=', $status)
            ->get();
    }

    public function trashBrand($disabled){
        return BP::select(
                'm_brand_products.id as id', 
                'm_category_products.name as category_produk', 
                'm_brand_products.name as name',
                'm_brand_products.disabled as disabled',
                'm_brand_products.created_at as created_at')
            ->join('m_category_products', 'm_brand_products.category_id', '=', 'm_category_products.id')
            ->latest()
            ->where('m_brand_products.disabled', '=', $disabled)
            ->get();
    }

    public function detailBrand($id){
        return BP::
        // select(
        //         'm_brand_products.id as id', 
        //         'm_category_products.name as category_produk', 
        //         'm_brand_products.name as name',
        //         'm_brand_products.disabled as disabled',
        //         'm_brand_products.created_at as created_at')
        //     ->join('m_category_products', 'm_brand_products.category_id', '=', 'm_category_products.id')
            find($id);
    }

    public function addBrand($name, $category, $user){
        return BP::create([
            'name' => $name,
            'category_id' => $category,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user
        ]);
    }

    public function updateBrand($id, $name, $category, $user){
        return BP::findOrFail($id)->update([
            'name' => $name,
            'category_id' => $category,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function activeBrand($id, $user){
        return BP::findOrFail($id)->update([
            'status' => true,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function nonActiveBrand($id, $user){
        return BP::findOrFail($id)->update([
            'status' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deleteTemporaryBrand($id, $user){
        return BP::findOrFail($id)->update([
            'disabled' => true,
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $user
        ]);
    }

    public function recoverBrand($id, $user){
        return BP::findOrFail($id)->update([
            'disabled' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deletePermanentBrand($id){
        return BP::find($id)->delete();
    }

    // FUNCTION SUB BRAND
    public function listAllSubBrand(){
        return SBP::select(
                'm_sub_brand_products.id as id', 
                'm_category_products.name as category_produk', 
                'm_brand_products.name as brand_produk', 
                'm_sub_brand_products.name as name',
                'm_sub_brand_products.created_at as created_at')
            ->join('m_category_products', 'm_sub_brand_products.category_id', '=', 'm_category_products.id')
            ->join('m_brand_products', 'm_sub_brand_products.brand_id', '=', 'm_brand_products.id')
            ->latest()
            ->get();
    }

    public function exceptSubBrandId($id){
        return SBP::latest()
            ->where('id', '!=', $id)
            ->get();
    }

    public function searchSubBrand($search){
        return SBP::latest()
            ->where('name', 'LIKE', '%'.$search.'%')
            ->get();
    }

    public function statusSubBrand($status){
        return SBP::select(
                'm_sub_brand_products.id as id', 
                'm_category_products.name as category_produk', 
                'm_brand_products.name as brand_produk', 
                'm_sub_brand_products.name as name',
                'm_sub_brand_products.created_at as created_at')
            ->join('m_category_products', 'm_sub_brand_products.category_id', '=', 'm_category_products.id')
            ->join('m_brand_products', 'm_sub_brand_products.brand_id', '=', 'm_brand_products.id')
            ->latest()
            ->where('m_sub_brand_products.status', '=', $status)
            ->get();
    }

    public function trashSubBrand($disabled){
        return SBP::select(
                'm_sub_brand_products.id as id', 
                'm_category_products.name as category_produk', 
                'm_brand_products.name as brand_produk', 
                'm_sub_brand_products.name as name',
                'm_sub_brand_products.created_at as created_at')
            ->join('m_category_products', 'm_sub_brand_products.category_id', '=', 'm_category_products.id')
            ->join('m_brand_products', 'm_sub_brand_products.brand_id', '=', 'm_brand_products.id')
            ->latest()
            ->where('m_sub_brand_products.disabled', '=', $disabled)
            ->get();
    }

    public function detailSubBrand($id){
        return SBP::
        // select(
        //         'm_brand_products.id as id', 
        //         'm_category_products.name as category_produk', 
        //         'm_brand_products.name as name',
        //         'm_brand_products.disabled as disabled',
        //         'm_brand_products.created_at as created_at')
        //     ->join('m_category_products', 'm_brand_products.category_id', '=', 'm_category_products.id')
            find($id);
    }

    public function addSubBrand($name, $category, $brand, $user){
        return SBP::create([
            'name' => $name,
            'category_id' => $category,
            'brand_id' => $brand,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user
        ]);
    }

    public function updateSubBrand($id, $name, $category, $brand, $user){
        return SBP::findOrFail($id)->update([
            'name' => $name,
            'category_id' => $category,
            'brand_id' => $brand,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function activeSubBrand($id, $user){
        return SBP::findOrFail($id)->update([
            'status' => true,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function nonActiveSubBrand($id, $user){
        return SBP::findOrFail($id)->update([
            'status' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deleteTemporarySubBrand($id, $user){
        return SBP::findOrFail($id)->update([
            'disabled' => true,
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $user
        ]);
    }

    public function recoverSubBrand($id, $user){
        return SBP::findOrFail($id)->update([
            'disabled' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deletePermanentSubBrand($id){
        return SBP::find($id)->delete();
    }

    // FUNCTION PRODUCT
    public function listAllProduct(){
        return mProduct::select(
                'm_products.id as id', 
                'code as code',
                'm_products.name as name',
                'description',
                'picture',
                'competitor',
                'competitor_name as cmp_name',
                'm_category_products.name as category', 
                'm_brand_products.name as brand', 
                'm_sub_brand_products.name as subbrand',
                'm_products.created_at as created_at')
            ->leftJoin('m_category_products', 'm_products.category_id', '=', 'm_category_products.id')
            ->leftJoin('m_brand_products', 'm_products.brand_id', '=', 'm_brand_products.id')
            ->leftJoin('m_sub_brand_products', 'm_products.subbrand_id', '=', 'm_sub_brand_products.id')
            ->latest()
            ->get();
    }

    public static function searchProduct($search){
        return mProduct::latest()
            ->where('name', 'LIKE', '%'.$search.'%')
            ->orWhere('code', '=', $search)
            ->get();
    }

    public static function searchLastCodeProduct($search){
        return mProduct::latest()
            ->where('code', 'LIKE', '%'.$search.'%')
            ->get();
    }

    public function statusProduct($status){
        return mProduct::select(
                'm_products.id as id', 
                'code',
                'm_products.name as name',
                'description',
                'picture',
                'competitor',
                'competitor_name as cmp_name',
                'm_category_products.name as category', 
                'm_brand_products.name as brand', 
                'm_sub_brand_products.name as subbrand',
                'm_products.created_at as created_at')
            ->leftJoin('m_category_products', 'm_products.category_id', '=', 'm_category_products.id')
            ->leftJoin('m_brand_products', 'm_products.brand_id', '=', 'm_brand_products.id')
            ->leftJoin('m_sub_brand_products', 'm_products.subbrand_id', '=', 'm_sub_brand_products.id')
            ->latest()
            ->where('m_products.status', '=', $status)
            ->get();
    }

    public function trashProduct($disabled){
        return mProduct::select(
                'm_products.id as id', 
                'code',
                'm_products.name as name',
                'description',
                'picture',
                'competitor',
                'competitor_name as cmp_name',
                'm_category_products.name as category', 
                'm_brand_products.name as brand', 
                'm_sub_brand_products.name as subbrand',
                'm_products.status as status',
                'm_products.created_at as created_at')
            ->leftJoin('m_category_products', 'm_products.category_id', '=', 'm_category_products.id')
            ->leftJoin('m_brand_products', 'm_products.brand_id', '=', 'm_brand_products.id')
            ->leftJoin('m_sub_brand_products', 'm_products.subbrand_id', '=', 'm_sub_brand_products.id')
            ->latest()
            ->where('m_products.disabled', '=', $disabled)
            ->get();
    }

    public function detailProduct($id){
        return mProduct::
            select(
                'm_products.id as id', 
                'code as code',
                'm_products.name as name',
                'description',
                'picture',
                'competitor',
                'competitor_name as cmp_name',
                'm_products.category_id as category_id',
                'm_category_products.name as category', 
                'm_products.brand_id as brand_id',
                'm_brand_products.name as brand', 
                'm_products.subbrand_id as subbrand_id',
                'm_sub_brand_products.name as subbrand',
                'm_products.created_at as created_at')
            ->leftJoin('m_category_products', 'm_products.category_id', '=', 'm_category_products.id')
            ->leftJoin('m_brand_products', 'm_products.brand_id', '=', 'm_brand_products.id')
            ->leftJoin('m_sub_brand_products', 'm_products.subbrand_id', '=', 'm_sub_brand_products.id')
            ->find($id);
    }

    public function addProduct($code, $name, $desc, $pict, $cmp, $cmp_name, $category, $brand, $subbrand, $user){
        return mProduct::create([
            'code' => $code,
            'name' => $name,
            'description' => $desc,
            'picture' => $pict,
            'competitor' => $cmp,
            'competitor_name' => $cmp_name,
            'category_id' => $category,
            'brand_id' => $brand,
            'subbrand_id' => $subbrand,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user
        ]);
    }

    public function updateProduct($id, $name, $desc, $cmp, $cmp_name, $category, $brand, $subbrand, $user){
        return mProduct::findOrFail($id)->update([
            'name' => $name,
            'description' => $desc,
            'competitor' => $cmp,
            'competitor_name' => $cmp_name,
            'category_id' => $category,
            'brand_id' => $brand,
            'subbrand_id' => $subbrand,
            'brand_id' => $brand,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function activeProduct($id, $user){
        return mProduct::findOrFail($id)->update([
            'status' => true,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function nonActiveProduct($id, $user){
        return mProduct::findOrFail($id)->update([
            'status' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deleteTemporaryProduct($id, $user){
        return mProduct::findOrFail($id)->update([
            'disabled' => true,
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $user
        ]);
    }

    public function recoverProduct($id, $user){
        return mProduct::findOrFail($id)->update([
            'disabled' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deletePermanentProduct($id){
        return mProduct::find($id)->delete();
    }
    
    // FUNCTION DISPLAY PRODUK
    public function listAllDisplay(){
        return DP::latest()
            ->get();
    }

    public function exceptDisplay($id){
        return DP::latest()
            ->where('id', '!=', $id)
            ->get();
    }

    public function searchDisplay($search){
        return DP::latest()
            ->where('name', 'LIKE', '%'.$search.'%')
            ->get();
    }

    public function statusDisplay($status){
        return DP::latest()
            ->where('status', '=', $status)
            ->get();
    }

    public function trashDisplay($disabled){
        return DP::latest()
            ->where('disabled', '=', $disabled)
            ->get();
    }

    public function detailDisplay($id){
        return DP::find($id);
    }

    public function addDisplay($name, $durability, $user){
        return DP::create([
            'name' => $name,
            'durability' => $durability,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user
        ]);
    }

    public function updateDisplay($id, $name, $durability, $user){
        return DP::findOrFail($id)->update([
            'name' => $name,
            'durability' => $durability,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function activeDisplay($id, $user){
        return DP::findOrFail($id)->update([
            'status' => true,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function nonActiveDisplay($id, $user){
        return DP::findOrFail($id)->update([
            'status' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deleteTemporaryDisplay($id, $user){
        return DP::findOrFail($id)->update([
            'disabled' => true,
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $user
        ]);
    }

    public function recoverDisplay($id, $user){
        return DP::findOrFail($id)->update([
            'disabled' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deletePermanentDisplay($id){
        return DP::find($id)->delete();
    }

    // FUNCTION CUSTOMER
    public function listAllCustomer(){
        return mCustomer::select(
                'm_customers.id as id',
                'm_customers.code as code', 
                'm_customers.name as name', 
                'm_customers.phone as phone', 
                'm_customers.photo as photo', 
                'm_customers.address as address', 
                'm_customers.LA as LA', 
                'm_customers.LO as LO', 
                'm_customers.area as area', 
                'm_customers.subarea as subarea',
                'm_customers.regist as regist', 
                'm_customers.type as type',
                'm_customers.banner as banner', 
                'm_branches.name as branch_name', 
                'm_staff.name as staff_name', 
                'm_customers.created_at as created_at')
            ->leftjoin('m_branches', 'm_customers.branch_id', '=', 'm_branches.id')
            ->leftjoin('m_staff', 'm_customers.staff_id', '=', 'm_staff.id')
            ->latest()
            ->get();
    }

    public function listAreaAllCustomer($type){
        return mCustomer::select(
                'm_customers.id as id',
                'm_customers.code as code', 
                'm_customers.name as name', 
                'm_customers.phone as phone', 
                'm_customers.photo as photo', 
                'm_customers.address as address', 
                'm_customers.LA as LA', 
                'm_customers.LO as LO', 
                'm_customers.area as area', 
                'm_customers.subarea as subarea',
                'm_customers.regist as regist', 
                'm_customers.type as type',
                'm_customers.banner as banner', 
                'm_branches.name as branch_name', 
                'm_staff.name as staff_name', 
                'm_customers.created_at as created_at')
            ->leftjoin('m_branches', 'm_customers.branch_id', '=', 'm_branches.id')
            ->leftjoin('m_staff', 'm_customers.staff_id', '=', 'm_staff.id')
            ->where('LA', '!=', NULL)
            ->where('type' , '=' , $type)
            // ->where('area' , 'LIKE' , '%'.$area.'%')
            ->latest()
            ->get();
    }

    public function listAreaAllOutlet($type){
        return mCustomer::select(
                'm_customers.id as id',
                'm_customers.code as code', 
                'm_customers.name as name', 
                'm_customers.phone as phone', 
                'm_customers.photo as photo', 
                'm_customers.address as address', 
                'm_customers.LA as LA', 
                'm_customers.LO as LO', 
                'm_customers.area as area', 
                'm_customers.subarea as subarea',
                'm_customers.regist as regist', 
                'm_customers.type as type',
                'm_customers.banner as banner', 
                'm_branches.name as branch_name', 
                'm_staff.name as staff_name', 
                'm_customers.created_at as created_at')
            ->leftjoin('m_branches', 'm_customers.branch_id', '=', 'm_branches.id')
            ->leftjoin('m_staff', 'm_customers.staff_id', '=', 'm_staff.id')
            ->where('LA', '!=', NULL)
            ->where('type' , '=' , $type)
            // ->where('area' , 'LIKE' , '%'.$area.'%')
            ->latest()
            ->get();
    }

    public function listAreaCustomer($disabled, $type){
        return mCustomer::select('area', 'subarea')
            ->where('m_customers.disabled', '=', $disabled)
            ->where('m_customers.type', '=', $type)->distinct()->get();
    }

    public function exceptCustomerId($id){
        return mCustomer::latest()
            ->where(['id', '!=', $id])
            ->get();
    }

    public static function searchCustomer($search){
        return mCustomer::select('id', 'code', 'name')
            ->where('name', 'LIKE', '%'.$search.'%')
            ->orWhere('code', 'LIKE', '%'.$search.'%')
            ->get();
    }
    

    public static function searchLastCodeCustomer($search){
        return mCustomer::latest()
            ->where('code', 'LIKE', '%'.$search.'%')
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function statusCustomer($status){
        return mCustomer::select(
                'm_customers.id as id',
                'm_customers.code as code', 
                'm_customers.name as name', 
                'm_customers.phone as phone', 
                'm_customers.photo as photo', 
                'm_customers.address as address', 
                'm_customers.LA as LA', 
                'm_customers.LO as LO', 
                'm_customers.area as area', 
                'm_customers.subarea as subarea',
                'm_customers.regist as regist', 
                'm_customers.type as type', 
                'm_customers.banner as banner',
                'm_branches.name as branch_name', 
                'm_staff.name as staff_name', 
                'm_customers.created_at as created_at')
            ->leftjoin('m_branches', 'm_customers.branch_id', '=', 'm_branches.id')
            ->leftjoin('m_staff', 'm_customers.staff_id', '=', 'm_staff.id')
            ->latest()
            ->where('m_customers.status', '=', $status)
            ->get();
    }

    public function trashCustomer($disabled,$type){
        return mCustomer::select(
                'm_customers.id as id',
                'm_customers.code as code', 
                'm_customers.name as name', 
                'm_customers.phone as phone', 
                'm_customers.photo as photo', 
                'm_customers.address as address', 
                'm_customers.LA as LA', 
                'm_customers.LO as LO', 
                'm_customers.area as area', 
                'm_customers.subarea as subarea',
                'm_customers.regist as regist', 
                'm_customers.type as type', 
                'm_customers.banner as banner', 
                'm_customers.status as status', 
                'm_branches.name as branch_name', 
                'm_staff.name as staff_name', 
                'm_customers.created_at as created_at')
            ->leftjoin('m_branches', 'm_customers.branch_id', '=', 'm_branches.id')
            ->leftjoin('m_staff', 'm_customers.staff_id', '=', 'm_staff.id')
            ->latest()
            ->where('m_customers.disabled', '=', $disabled)
            ->where('m_customers.type', '=', $type)
            ->get();
    }

    public function lisCustomerCard($disabled,$type){
        return mCustomer::select(
            'm_customers.id as id',
            'm_customers.code as code', 
            'm_customers.name as name', 
            'm_customers.phone as phone', 
            'm_customers.photo as photo', 
            'm_customers.address as address', 
            'm_customers.LA as LA', 
            'm_customers.LO as LO', 
            'm_customers.area as area', 
            'm_customers.subarea as subarea',
            'm_customers.regist as regist', 
            'm_customers.type as type', 
            'm_customers.banner as banner',
            'm_customers.status as status', 
            'm_branches.name as branch_name', 
            'm_staff.name as staff_name', 
            'm_customers.created_at as created_at')
        ->leftjoin('m_branches', 'm_customers.branch_id', '=', 'm_branches.id')
        ->leftjoin('m_staff', 'm_customers.staff_id', '=', 'm_staff.id')
        ->latest()
        ->where('m_customers.disabled', '=', $disabled)
        ->where('m_customers.type', '=', $type)
        ->paginate(20);
    }

    public function searchCustomerCard($disabled,$type,$search){
        return mCustomer::select(
            'm_customers.id as id',
            'm_customers.code as code', 
            'm_customers.name as name', 
            'm_customers.phone as phone', 
            'm_customers.photo as photo', 
            'm_customers.address as address', 
            'm_customers.LA as LA', 
            'm_customers.LO as LO', 
            'm_customers.area as area', 
            'm_customers.subarea as subarea',
            'm_customers.regist as regist', 
            'm_customers.type as type', 
            'm_customers.banner as banner',
            'm_customers.status as status', 
            'm_branches.name as branch_name', 
            'm_staff.name as staff_name', 
            'm_customers.created_at as created_at')
        ->leftjoin('m_branches', 'm_customers.branch_id', '=', 'm_branches.id')
        ->leftjoin('m_staff', 'm_customers.staff_id', '=', 'm_staff.id')
        ->latest()
        ->where('m_customers.disabled', '=', $disabled)
        ->where('m_customers.type', '=', $type)
        ->where('m_customers.code', 'LIKE', '%'.$search.'%')
        ->orWhere('m_customers.name', 'LIKE', '%'.$search.'%')
        ->paginate(20);
    }

    public function detailCustomer($id){
        return mCustomer::
            select(
                'm_customers.id as id',
                'm_customers.code as code', 
                'm_customers.name as name', 
                'm_customers.phone as phone', 
                'm_customers.photo as photo', 
                'm_customers.address as address', 
                'm_customers.LA as LA', 
                'm_customers.LO as LO', 
                'm_customers.area as area', 
                'm_customers.subarea as subarea',
                'm_customers.regist as regist', 
                'm_customers.type as type', 
                'm_customers.type as banner',
                'm_customers.branch_id as branch_id', 
                'm_branches.name as branch_name', 
                'm_staff.name as staff_name', 
                'm_customers.created_at as created_at')
            ->leftjoin('m_branches', 'm_customers.branch_id', '=', 'm_branches.id')
            ->leftjoin('m_staff', 'm_customers.staff_id', '=', 'm_staff.id')
            ->find($id);
            // ->first();
    }

    public function addCustomer($code, $name, $phone, $photo, $address, $LA, $LO, $area, $subarea, $regist, $type, $branch, $staff, $user){
        return mCustomer::create([
            'code' => $code,
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'LA' => $LA,
            'LO' => $LO,
            'area' => $area,
            'subarea' => $subarea,
            'regist' => $regist,
            'type' => $type,
            'branch_id' => $branch,
            'staff_id' => $staff,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user
        ]);
    }

    public function updateCustomer($id, $code, $name, $phone, $address, $LA, $LO, $area, $subarea, $regist, $branch, $staff, $user){
        return mCustomer::findOrFail($id)->update([
            'code' => $code,
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'LA' => $LA,
            'LO' => $LO,
            'area' => $area,
            'subarea' => $subarea,
            'regist' => $regist,
            'branch_id' => $branch,
            'staff_id' => $staff,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function updateLocCustomer($id, $LA, $LO, $user){
        return mCustomer::findOrFail($id)->update([
            'LA' => $LA,
            'LO' => $LO,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function updateBannerCustomer($id, $banner, $user){
        return mCustomer::findOrFail($id)->update([
            'banner' => $banner,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function updatePhotoCustomer($id, $photo, $user){
        return mCustomer::findOrFail($id)->update([
            'photo' => $photo,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function activeCustomer($id, $user){
        return mCustomer::findOrFail($id)->update([
            'status' => true,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function nonActiveCustomer($id, $user){
        return mCustomer::findOrFail($id)->update([
            'status' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deleteTemporaryCustomer($id, $user){
        return mCustomer::findOrFail($id)->update([
            'disabled' => true,
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $user
        ]);
    }

    public function recoverCustomer($id, $user){
        return mCustomer::findOrFail($id)->update([
            'disabled' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deletePermanentCustomer($id){
        return mCustomer::find($id)->delete();
    }

    // FUNCTION OWNER
    public function addOwner($name, $nik, $phone, $address, $customer, $user){
        return MOwner::create([
            'name' => $name,
            'NIK' => $nik,
            'phone' => $phone,
            'address' => $address,
            'customer_id' => $customer,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user
        ]);
    }

    // FUNCTION STAFF
    public function listAllStaff(){
        return mStaff::select(
                'm_staff.id as id',
                'm_staff.code as code',
                'm_staff.name as name',
                'gender',
                'phone',
                'm_jabatans.name as jabatan',
                'username',
                'email',
                'm_staff.created_at as created_at')
            ->join('users', 'm_staff.user_id', '=', 'users.id')
            ->leftjoin('m_jabatans', 'm_staff.jabatan_id', '=', 'm_jabatans.id')
            ->latest()
            ->get();
    }

    public function exceptStaffId($id){
        return mStaff::select(
                'm_staff.id as id',
                'm_staff.code as code',
                'm_staff.name as name',
                'gender',
                'phone',
                'm_jabatans.name as jabatan',
                'username',
                'email',
                'm_staff.created_at as created_at')
            ->join('users', 'm_staff.user_id', '=', 'users.id')
            ->leftjoin('m_jabatans', 'm_staff.jabatan_id', '=', 'm_jabatans.id')
            ->latest()
            ->where('m_staff.id', '!=', $id)
            ->get();
    }

    public function searchStaffId($id){
        return mStaff::latest()
            ->where('id', '=', $id)
            ->get();
    }

    public function searchStaffUserId($id){
        return mStaff::latest()
            ->where('user_id', '=', $id)
            ->first()
            ->get();
    }

    public function searchStaff($search){
        return mStaff::latest()
            ->where('name', 'LIKE', '%'.$search.'%')
            ->get();
    }

    public function searchLastCodeStaff($search){
        return mStaff::latest()
            ->where('code', 'LIKE', '%'.$search.'%')
            ->get();
    }

    public function statusStaff($status){
            return mStaff::select(
                'm_staff.id as id',
                'm_staff.code as code',
                'm_staff.name as name',
                'gender',
                'phone',
                'm_jabatans.name as jabatan',
                'username',
                'email',
                'm_staff.created_at as created_at')
            ->join('users', 'm_staff.user_id', '=', 'users.id')
            ->leftjoin('m_jabatans', 'm_staff.jabatan_id', '=', 'm_jabatans.id')
            ->latest()
            ->where('m_staff.status', '=', $status)
            ->get();
    }

    public function trashStaff($disabled,$type){
        return mStaff::select(
                'm_staff.id as id',
                'm_staff.code as code',
                'm_staff.name as name',
                'gender',
                'phone',
                'm_jabatans.name as jabatan',
                'username',
                'email',
                'm_staff.created_at as created_at')
            ->join('users', 'm_staff.user_id', '=', 'users.id')
            ->leftjoin('m_jabatans', 'm_staff.jabatan_id', '=', 'm_jabatans.id')
            ->latest()
            ->where('m_staff.disabled', '=', $disabled)
            ->get();
    }

    public function detailStaff($id){
        return mStaff::
        // select(
        //         'm_brand_products.id as id', 
        //         'm_category_products.name as category_produk', 
        //         'm_brand_products.name as name',
        //         'm_brand_products.disabled as disabled',
        //         'm_brand_products.created_at as created_at')
        //     ->join('m_category_products', 'm_brand_products.category_id', '=', 'm_category_products.id')
            find($id);
    }

    public function addStaff($code, $name, $gender, $phone, $jabatan, $user_id, $user){
        return mStaff::create([
            'code' => $code,
            'name' => $name,
            'gender' => $gender,
            'phone' => $phone,
            'jabatan_id' => $jabatan,
            'user_id' => $user_id,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user
        ]);
    }

    public function updateStaff($id, $code, $name, $gender, $phone, $jabatan, $user_id, $user){
        return mStaff::findOrFail($id)->update([
            'code' => $code,
            'name' => $name,
            'gender' => $gender,
            'phone' => $phone,
            'jabatan_id' => $jabatan,
            'user_id' => $user_id,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function activeStaff($id, $user){
        return mStaff::findOrFail($id)->update([
            'status' => true,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function nonActiveStaff($id, $user){
        return mStaff::findOrFail($id)->update([
            'status' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deleteTemporaryStaff($id, $user){
        return mStaff::findOrFail($id)->update([
            'disabled' => true,
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $user
        ]);
    }

    public function recoverStaff($id, $user){
        return mStaff::findOrFail($id)->update([
            'disabled' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deletePermanentStaff($id){
        return mStaff::find($id)->delete();
    }

    // FUNCTION USERS ACCOUNT
    public function addUser($name, $email, $username, $password, $user){
        return User::create([
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => Hash::make($password),
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user
        ]);
    }

    public function searchUser($username, $email){
        return User::where('email', '=', $email)
        ->orWhere('username', '=', $username)
        ->latest()
        ->get()
        ->first();
    }

    public function deleteTemporaryUser($id, $user){
        return User::findOrFail($id)->update([
            'disabled' => true,
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $user
        ]);
    }

    public function recoverUser($id, $user){
        return User::findOrFail($id)->update([
            'disabled' => false,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $user
        ]);
    }

    public function deletePermanentUser($id){
        return User::find($id)->delete();
    }

    // FUNCTION VISIT
    public function ListAllVisit(){
        return tVisit::selectRaw('t_visits.date as dateVisit,
                t_visits.staff_id as staffId,
                m_staff.name as staffName,
                count(distinct t_visits.order) as visited,
                sum(t_visits.qty_sample) as sample,
                count(case m_customers.type when 0 then 1 else null end) as custVisited,
                count(case m_customers.type when 1 then 0 else null end) as outletVisited,
                count(case m_fotos.type when "V" then 0 else null end) as photoVisited'
            )
            ->groupBy('t_visits.date', 'm_staff.name', 't_visits.staff_id')
            ->join('m_staff', 't_visits.staff_id', '=', 'm_staff.id')
            ->join('m_customers', 't_visits.customer_id', '=', 'm_customers.id')
            ->leftjoin('m_fotos', 't_visits.id', '=', 'm_fotos.visit_id')
            ->orderBy('t_visits.date', 'DESC')
            ->where('t_visits.timeOut', '!=', "")
            ->where('m_fotos.type', '=', 'V')
            // ->distinct()
            ->get();
    }

    public function countVisitCust(){
        return tVisit::
            select('t_visits.date',
                't_visits.staff_id',
                'm_staff.name',
                DB::raw('count(t_visits.order) as visited'),
                DB::raw('sum(t_visits.qty_sample) as sumSample'),
                DB::raw('count(m_customers.type = "1") as CustVisited'),
                DB::raw('count(m_customers.type = "0") as GeraiVisited')
                // 't_visits.order',
                // 't_visits.qty_sample',
                // 'm_customers.type',
                // 'm_fotos.type'
            )
            ->where('m_fotos.type', '=', 'V')
            ->join('m_staff', 't_visits.staff_id', '=', 'm_staff.id')
            ->join('m_customers', 't_visits.customer_id', '=', 'm_customers.id')
            ->leftjoin('m_fotos', 't_visits.id', '=', 'm_fotos.visit_id')
            ->groupBy('t_visits.date', 't_visits.staff_id','m_staff.name')
            ->orderBy('t_visits.date', 'DESC')
            // ->count('t_visits.order', 'm_customers.type', 'm_fotos.type');
            // ->sum('t_visits.qty_sample');
            ->get()->toArray();
    }

    public function TestVisit(){
        return tVisit::select('t_visits.date as dateVisit',
                't_visits.staff_id as staffId',
                'm_staff.name as staffName',
                't_visits.order',
                'm_customers.code',
                'm_customers.name',
                'm_customers.type as ct_type',
                'm_fotos.type as ft_type'
            )
            // ->groupBy('t_visits.date', 'm_staff.name', 't_visits.staff_id')
            ->join('m_staff', 't_visits.staff_id', '=', 'm_staff.id')
            ->join('m_customers', 't_visits.customer_id', '=', 'm_customers.id')
            ->leftjoin('m_fotos', 't_visits.id', '=', 'm_fotos.visit_id')
            ->orderBy('t_visits.order', 'ASC')
            // ->orderBy('t_visits.date', 'DESC')
            ->where('t_visits.date', '=', "2024-01-26")
            ->where('t_visits.staff_id', '=', "4")
            ->where('m_customers.type', '=', "0")
            ->where('t_visits.timeOut', '!=', "")
            ->where('m_fotos.type', '=', 'V')
            ->distinct()
            ->get()->toArray();
    }

    public function ListAllVisitDetail(){
        return tVisit::select(
            't_visits.id as id',
            'm_customers.code as custCode',
            'm_customers.name as custName',
            'm_customers.address as custAddress',
            'm_customers.type as custType',
            'm_customers.regist as custRegist',
            't_visits.order',
            't_visits.timeIn',
            't_visits.timeOut',
            't_visits.LA',
            't_visits.LO',
            't_visits.gift',
            't_visits.qty_sample',
            't_visits.banner',
            't_visits.activity',
            't_visits.notes',
            't_visits.register',
            't_visits.qtysell',
            'm_staff.name as staffName',
            'm_fotos.photo as photo',
            'm_fotos.type as photoType',
        )
        ->join('m_customers', 't_visits.customer_id', '=', 'm_customers.id')
        ->join('m_staff', 't_visits.staff_id', '=', 'm_staff.id')
        ->leftjoin('m_fotos', 't_visits.id', '=', 'm_fotos.visit_id')
        ->where('m_fotos.type', '=', 'V')
        ->get()->first();
    }

    public function detailVisit($date, $staff){
        return tVisit::selectRaw('t_visits.date as dateVisit,
                t_visits.staff_id as staffId,
                m_staff.name as staffName,
                count(t_visits.order) as visited,
                count(case m_customers.type when 0 then 1 else null end) as custVisited,
                count(case m_customers.type when 1 then 0 else null end) as outletVisited,
                count(case m_fotos.type when "V" then 0 else null end) as photoVisited,
                min(timeIn) as firstIn,
                max(timeOut) as lastOut'
            )
            ->groupBy('t_visits.date', 'm_staff.name', 't_visits.staff_id')
            ->join('m_staff', 't_visits.staff_id', '=', 'm_staff.id')
            ->join('m_customers', 't_visits.customer_id', '=', 'm_customers.id')
            ->leftjoin('m_fotos', 't_visits.id', '=', 'm_fotos.visit_id')
            ->orderBy('t_visits.date', 'DESC')
            ->whereDate('date', '=', $date)
            ->where('t_visits.staff_id', '=', $staff)
            ->where('t_visits.timeOut', '!=', "")
            ->where('m_fotos.type', '=', 'V')
            // ->distinct()
            ->get()
            ->first();
    }

    public function ListDetailVisit($date, $staff){
        return tVisit::select(
            't_visits.id as id',
            'm_customers.code as custCode',
            'm_customers.name as custName',
            'm_customers.address as custAddress',
            'm_customers.type as custType',
            'm_customers.regist as custRegist',
            't_visits.order',
            't_visits.timeIn',
            't_visits.timeOut',
            't_visits.LA',
            't_visits.LO',
            't_visits.gift',
            't_visits.qty_sample',
            't_visits.banner',
            't_visits.activity',
            't_visits.notes',
            't_visits.register',
            't_visits.qtysell',
            'm_staff.name as staffName',
            'm_fotos.photo as photo',
            'm_fotos.type as photoType',
        )
        ->join('m_customers', 't_visits.customer_id', '=', 'm_customers.id')
        ->join('m_staff', 't_visits.staff_id', '=', 'm_staff.id')
        ->leftjoin('m_fotos', 't_visits.id', '=', 'm_fotos.visit_id')
        ->whereDate('date', '=', $date)
        ->where('t_visits.staff_id', '=', $staff)
        ->where('m_fotos.type', '=', 'V')
        // ->distinct()
        ->get();
    }

    public function cekOrderVisit($staff_id, $date){
        return tVisit::select('order as ord')
        ->where('staff_id', '=', $staff_id)
        ->whereDate('date', $date)
        ->orderBy('ord', 'desc')
        ->get();
    }

    public function addVisit($order, $customer_id, $staff_id){
        return tVisit::create([
            'date' => date('Y-m-d'),
            'order' => $order,
            'timeIn' => date('H:i:s'),
            'customer_id' => $customer_id,
            'staff_id' => $staff_id
        ]);
    }

    public function updateVisitCustomer($visit_id, $LA, $LO, $gift, $sample, $qty_sample, $banner, $activity, $notes, $register, $qtysell){
        return tVisit::findOrFail($visit_id)
            ->update([
                'timeOut' => date('H:i:s'),
                'LA' => $LA,
                'LO' => $LO,
                'gift' => $gift,
                'product_id' => $sample,
                'qty_sample' => $qty_sample,
                'banner' => $banner,
                'activity' => $activity,
                'notes' => $notes,
                'register' => $register,
                'qtysell' => $qtysell,
            ]);
    }

    public function getLastIdVisit(){
        return tVisit::latest()->first();
    }

    public function ListAllDisplayVisit(){
        return tVisit::select(
            't_visits.id as idVisit',
            't_visits.date as dateVisit',
            'm_staff.name as nameStaff',
            'm_customers.code as codeCust',
            'm_customers.name as nameCust',
            'dt_cust_visits.category_id as idCat',
            'dt_cust_visits.display_id as idDisplay',
            'dt_cust_visits.reason as reason',
            'm_fotos.photo as photoDisplay'
        )
        // ->join('t_visits', 'dt_cust_visits.visit_id', 't_visits.id')
        ->join('dt_cust_visits', 't_visits.id', 'dt_cust_visits.visit_id')
        ->join('m_customers', 't_visits.customer_id', 'm_customers.id')
        ->join('m_staff', 't_visits.staff_id', 'm_staff.id')
        ->join('m_fotos', 'm_fotos.visit_id', 't_visits.id')
        ->where('m_fotos.type', '=', 'D')
        ->orderBy('t_visits.date', 'DESC')
        ->distinct()
        ->get();
    }

    public function ListAllUsedProduct(){
        return tVisit::select(
            't_visits.id as idVisit',
            't_visits.date as dateVisit',
            'm_staff.name as nameStaff',
            't_visits.customer_id as geraiId',
            'm_customers.code as geraiCode',
            'm_customers.name as geraiName',
            'dt_outlet_visits.product_id as prodId',
            'm_products.name as prodName',
            'dt_outlet_visits.price_buy as priceBuy',
            'dt_outlet_visits.reason as reason',
            'dt_outlet_visits.store_id as custId',
            'dt_outlet_visits.pasar as pasar',
            'dt_outlet_visits.patokan as patokan',
            'm_fotos.photo as photoVisit'
        )
        ->join('dt_outlet_visits', 't_visits.id', 'dt_outlet_visits.visit_id')
        ->join('m_customers', 't_visits.customer_id', 'm_customers.id')
        ->join('m_products', 'dt_outlet_visits.product_id', 'm_products.id')
        ->join('m_staff', 't_visits.staff_id', 'm_staff.id')
        ->join('m_fotos', 'm_fotos.visit_id', 't_visits.id')
        ->where('m_fotos.type', '=', 'V')
        ->orderBy('t_visits.date', 'DESC')
        ->distinct()
        ->get();
    }

    // FUNCTION DETAIL VISIT CUSTOMER
    public function addDetailVisitCustomer($visit_id, $category_id, $display_id, $stok, $reason){
        return dtCustVisit::create([
            'visit_id' => $visit_id,
            'category_id' => $category_id,
            'display_id' => $display_id,
            'stok' => $stok,
            'reason' => $reason,
        ]);
    }

    // FUNCTION DETAIL VISIT OUTLET
    public function addDetailVisitOutlet($visit_id, $product_id, $price_buy, $reason, $store_id, $pasar, $patokan, $user){
        return dtOutletVisit::create([
            'visit_id' => $visit_id,
            'product_id' => $product_id,
            'price_buy' => $price_buy,
            'reason' => $reason,
            'store_id' => $store_id,
            'pasar' => $pasar,
            'patokan' => $patokan,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user
        ]);
    }

    // FUNCTION FOTO
    public function addFoto($name, $type, $photo, $visit_id, $user){
        return mFoto::create([
            'name' => $name,
            'type' => $type,
            'photo' => $photo,
            'visit_id' => $visit_id,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user
        ]);
    }

    // FUNCTION SCHEDULE VISIT
    public function listAllSchedule(){
        return mScheduleVisit::select(
            'm_schedule_visits.id as id',
            'm_schedule_visits.name as scheduleName',
            'start_date',
            'end_date',
            'target',
            'm_staff.id as staffId',
            'm_staff.name as staffName',
            'm_schedule_visits.created_at as created',
        )
        ->join('m_staff', 'm_schedule_visits.staff_id', '=', 'm_staff.id')
        ->get();
    }

    public function addScheduleVisit($name, $start_date, $end_date, $pattern, $value, $staff_id, $user){
        return mScheduleVisit::create([
            'name' => $name,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'pattern' => $pattern,
            'value' => $value,
            'staff_id' => $staff_id,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user,
        ]);
    }

    public function updateTargetVisit($id_schedule, $target, $user){
        return mScheduleVisit::findOrFail($id_schedule)
            ->update([
                'target' => $target,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $user,
            ]);
    }

    public function searchScheduleVisit($search){
        return mScheduleVisit::select('id', 'name')
        ->where('id', '=', $search)
        ->orWhere('name', 'LIKE', '%'.$search.'%')
        ->get()
        ->first();
    }

    public function detailScheduleVisit($id){
        return mScheduleVisit::find($id)->get()->first();
    }


    public function listDetailSchedule($id_schedule){
        return SD::select(
            'm_schedule_visit_details.id as id',
            'm_schedule_visits.id as scheduleId',
            'm_customers.code as custCode',
            'm_customers.name as custName',
            'm_customers.address as custAddress',
            'm_customers.area as custArea',
            'm_customers.type as custType',
        )
        ->leftjoin('m_schedule_visits', 'm_schedule_visit_details.schedule_visit_id', '=', 'm_schedule_visits.id')
        ->leftjoin('m_customers', 'm_schedule_visit_details.customer_id', '=', 'm_customers.id')
        ->where('m_schedule_visit_details.schedule_visit_id', '=', $id_schedule)
        ->get();
    }

    public function countDetailSchedule($id_schedule){
        return SD::find($id_schedule)->get()->count();
    }

    public function addDetailSchedule($schedule_id, $customer_id, $user){
        return SD::create([
            'schedule_visit_id' => $schedule_id,
            'customer_id' => $customer_id,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $user,
        ]);
    }

    public function dataDetailSchedule($id){
        return SD::find($id)->select(
            'm_schedule_visit_details.id as id',
            'm_schedule_visits.id as scheduleId',
            'm_customers.code as custCode',
            'm_customers.name as custName',
        )
        ->leftjoin('m_schedule_visits', 'm_schedule_visit_details.schedule_visit_id', '=', 'm_schedule_visits.id')
        ->leftjoin('m_customers', 'm_schedule_visit_details.customer_id', '=', 'm_customers.id')
        ->first();
    }

    public function deleteDetailSchedule($id){
        return SD::find($id)->delete();
    }
}
