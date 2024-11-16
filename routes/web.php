<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRequestCertificate;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\ResidentListController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\CertificatesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PrintAllCertificateController;


Route::middleware(['web'])->group(function () {
    // Routes that render HTML views
    Route::get('/User', [UserController::class, 'index'])->name('user.index');
    Route::get('/User/forum', [UserController::class, 'forum'])->name('user.forum');
    Route::get('/User/aboutus', [UserController::class, 'aboutus'])->name('user.aboutus');
    Route::get('/User/events', [UserController::class, 'event'])->name('user.events');
    Route::get('/User/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/User/profile/display', [UserController::class, 'profile_user'])->name('user.profile_user');
    Route::post('/User/profile/update', [UserController::class, 'updateProfile'])->name('user.update_profile');
    Route::post('/User/save-member-data', [UserController::class, 'store'])->name('user.store');
    Route::get('/User/members', [UserController::class, 'displayMembers'])->name('user.display');
    Route::delete('/User/members/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/User/edit/{id}', [UserController::class, 'edit'])->name('members.edit');
    Route::post('/User/update', [UserController::class, 'update'])->name('members.update');
    Route::get('/User/certificate', [UserController::class, 'certificate'])->name('user.certificate');
    Route::post('User/certificate/indigency', [UserController::class, 'submitRequestindignecy'])->name('submit.indigency.request');
    Route::get('/User/certificate/get', [UserController::class, 'getRelatedData'])->name('related-data');
    Route::post('/User/certificate/businesspermit', [UserController::class, 'submitBusinessPermit'])->name('submit.business.permit');
    Route::post('/submit-cessation', [UserController::class, 'submitCessation'])->name('submit.cessation');
    Route::post('User/certificate/Cert', [UserController::class, 'submitRequestcertificate'])->name('submit.certificate.request');
    Route::post('User/certificate/soloparent', [UserController::class, 'submitRequestsoloparent'])->name('submit.soloparent.request');
    Route::post('User/certificate/FTJ', [UserController::class, 'submitRequestftj'])->name('submit.ftj.request');
    Route::post('User/certificate/goodmoral', [UserController::class, 'submitRequestgoodmoral'])->name('submit.goodmoral.request');
    Route::post('User/certificate/lawincome', [UserController::class, 'submitRequestlawincome'])->name('submit.lawincome.request');
    Route::get('/User/getData', [UserController::class, 'getData'])->name('getData');
    Route::post('/User/cancel-request', [UserController::class, 'cancelRequest'])->name('cancel.request');
    Route::post('/User/forum/post',  [UserController::class, 'forumpost'])->name('Admin.forumpost.user');
    Route::get('/User/forum/data', [UserController::class, 'getForumData'])->name('User.forum.data');
    Route::get('/User/getInfos',  [UserController::class, 'getInfos'])->name('getInfos');
    Route::get('/User/getActiveOfficials', [UserController::class, 'getActiveOfficials'])->name('getActiveOfficials');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');












    // Routes that handle form submissions
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
});
Route::get('/Admin/count-pending-ftj', [CertificatesController::class, 'countPendingFtj'])->name('count.pending.ftj');
Route::get('/Admin/count-pending-indigency', [CertificatesController::class, 'countPendingindigency'])->name('count.pending.indigency');
Route::get('/Admin/count-pending-certificate', [CertificatesController::class, 'countPendingcert'])->name('count.pending.cert');
Route::get('/Admin/count-pending-permit', [CertificatesController::class, 'countPendingpermit'])->name('count.pending.permit');
Route::get('/Admin/count-pending-cessation', [CertificatesController::class, 'countPendingcessation'])->name('count.pending.cessation');
Route::get('/Admin/count-pending-soloparent', [CertificatesController::class, 'countPendingsoloparent'])->name('count.pending.soloparent');
Route::get('/Admin/certificate/get-data/{type}', [CertificatesController::class, 'getData']);
Route::get('/Admin/certificate/GetdataApproved/{type}', [CertificatesController::class, 'GetdataApproved']);
Route::get('/Admin/certificate/get', [CertificatesController::class, 'getRelatedData'])->name('related-datas');
Route::match(['get', 'post'], '/Admin/generate-pdf', [CertificatesController::class, 'generatePDF'])->name('generate.pdf');
Route::post('/Admin/certificate/update', [CertificatesController::class, 'sendEmailNotificationCert'])->name('approvecert');
Route::post('/Admin/certificate/update-all', [CertificatesController::class, 'sendAllEmailNotificationCert'])->name('approveallcert');
Route::post('/Admin/certificate/claim', [CertificatesController::class, 'sendEmailNotificationClaim'])->name('claimcert');
Route::post('/Admin/certificate/ed', [CertificatesController::class, 'sendEmailNotificationClaimed'])->name('claimedcert');
Route::post('/Admin/certificate/Decline', [CertificatesController::class, 'sendEmailNotificationDecline'])->name('declined');
Route::get('/admin/certificates', [CertificatesController::class, 'getCertificates'])->name('admin.certificates');
Route::post('/generate-all-approved-pdfs-indigency', [PrintAllCertificateController::class, 'generateAllApprovedPDFsIndigency']);
Route::post('/generate-all-approved-pdfs-permit', [PrintAllCertificateController::class, 'generateAllApprovedPDFsPermit']);
Route::post('/generate-all-approved-pdfs-FTJ', [PrintAllCertificateController::class, 'generateAllApprovedPDFsFTJ']);
Route::post('/generate-all-approved-pdfs-cert', [PrintAllCertificateController::class, 'generateAllApprovedPDFscert']);
Route::post('/generate-all-approved-pdfs-cessation', [PrintAllCertificateController::class, 'generateAllApprovedPDFscessation']);
Route::post('/generate-all-approved-pdfs-soloparent', [PrintAllCertificateController::class, 'generateAllApprovedPDFssoloparent']);
Route::post('Admin/certificate/indigency', [AdminRequestCertificate::class, 'submitRequestindignecy'])->name('Admin.submit.indigency.request');
Route::post('Admin/certificate/permit', [AdminRequestCertificate::class, 'submitBusinessPermit'])->name('Admin.submit.permit.request');
Route::post('Admin/certificate/cert', [AdminRequestCertificate::class, 'submitRequestcertificate'])->name('Admin.submit.certificate.request');
Route::post('Admin/certificate/cessation', [AdminRequestCertificate::class, 'submitBusinessCessation'])->name('Admin.submit.cessation.request');
Route::post('Admin/certificate/FTJ', [AdminRequestCertificate::class, 'submitFTJ'])->name('Admin.submit.ftj.request');
Route::post('Admin/certificate/soloparent', [AdminRequestCertificate::class, 'submitRequestsoloparent'])->name('Admin.submit.soloparent.request');


Route::post('/sum-copies', [StatisticsController::class, 'sumCopies'])->name('sum.copies');
Route::post('/export-excel', [ExportController::class, 'exportExcel']);
Route::get('/download-excel/{filename}', [ExportController::class, 'downloadExcel']);
Route::get('/statistical/get', [StatisticsController::class, 'getResidentsAndMembers'])->name('admin.getmembers');
Route::get('/statistical/index', [StatisticsController::class, 'index'])->name('admin.index.stat');
Route::get('/Admin', [AdminController::class, 'statisticalreport'])->name('admin.statisticalreport');
Route::get('/sample', [AdminController::class, 'sample'])->name('sample');
Route::get('/Admin/resident', [AdminController::class, 'resident'])->name('admin.resident');
Route::get('/Admin/certificate', [AdminController::class, 'certificate'])->name('admin.certificate');
Route::get('/Admin/indigency', [AdminController::class, 'indigency'])->name('admin.indigency');
Route::get('/Admin/ftj', [AdminController::class, 'ftj'])->name('admin.ftj');
Route::get('/Admin/cessation', [AdminController::class, 'cessation'])->name('admin.cessation');
Route::get('/Admin/permit', [AdminController::class, 'permit'])->name('admin.permit');
Route::get('/Admin/soloparent', [AdminController::class, 'soloparent'])->name('admin.soloparent');
Route::get('/Admin/pendingaccount', [AdminController::class, 'pendingaccount'])->name('admin.pendingaccount');
Route::get('/Admin/forum', [AdminController::class, 'forum'])->name('Admin.forum');
Route::post('/Admin/forum',  [AdminController::class, 'forumpost'])->name('Admin.forumpost');
Route::get('/admin/forum/data', [AdminController::class, 'getForumData'])->name('admin.forum.data');
Route::post('/Admin/store',[AdminController::class,'store'])->name('admin.forum.store');
Route::get('/comments/{comment}', [AdminController::class, 'fetchComments']);
Route::post('/Admin/savereply', [AdminController::class, 'saveReply'])->name('admin.saveReply.store');
Route::get('/reply/{reply}', [AdminController::class, 'fetchreplies']);
Route::post('/forums/{id}/archive',  [AdminController::class, 'archiveForum'])->name('forums.archive');
Route::get('/forums/statuses', [AdminController::class, 'getForumStatuses'])->name('forums.statuses');
Route::post('/forums/{id}/restore', [AdminController::class, 'restore'])->name('forums.restore');
Route::get('/pendingaccount', [ResidentController:: class, 'pendingaccount'])->name('residents.pendingaccount');
Route::get('/accountview', [ResidentController:: class, 'accountview'])->name('residents.accountview');
Route::post('/sendEmailNotification', [ResidentController::class, 'sendEmailNotification'])->name('send.email.notification');
Route::post('/sendEmailDeclineNotification', [ResidentController::class, 'sendEmailDeclineNotification'])->name('send.declined.notification');
Route::get('/admin/resident/index', [ResidentListController::class, 'index'])->name('admin.residents');
Route::get('/admin/residents', [ResidentListController::class, 'getResidents'])->name('admin.getresident');
Route::post('/save-restriction', [ResidentListController::class, 'store'])->name('save.restriction');
Route::post('/updateStatus', [ResidentListController::class, 'updateStatus'])->name('admin.updatestatus');
Route::post('/getresidentview', [ResidentListController::class, 'getResidentsview'])->name('admin.getResidentsview');
Route::post('/admin/resident', [OfficialController::class, 'addOfficial'])->name('official.add');
Route::get('/admin/contentmanager', [AdminController::class, 'contentmanager'])->name('admin.contentmanager');
Route::get('/admin/event', [AdminController::class, 'event'])->name('admin.event');
Route::get('/admin/announcement', [AdminController::class, 'announcement'])->name('admin.announcement');
Route::get('/Admin/addresident', [AdminController::class, 'addresident'])->name('admin.addresident');
Route::get('/Admin/addofficer', [AdminController::class, 'addofficer'])->name('admin.addofficer');
Route::get('/admin/project', [AdminController::class, 'project'])->name('admin.project');
Route::get('/admin/resident', [OfficialController::class, 'index'])->name('officials.index');
Route::post('/update-official-status', [OfficialController::class, 'updateStatus'])->name('official.updateStatus');
Route::post('/archiveAll', [OfficialController::class, 'archiveAll'])->name('officials.archiveAll');
Route::post('/admin/contentmanager', [EventsController::class, 'store'])->name('events.store');
Route::post('/admin/contentmanager/event', [EventsController::class, 'store_event'])->name('events.store_event');
Route::post('/admin/contentmanager/project', [EventsController::class, 'store_project'])->name('events.store_project');
Route::get('/events',  [EventsController::class, 'index'])->name('events.index');
Route::put('/events/{id}/archive', [EventsController::class, 'archive'])->name('events.archive');
Route::put('/events/{id}/restore', [EventsController::class, 'restore'])->name('events.restore');
Route::get('/events/{eventId}', [EventsController::class, 'showlist'])->name('events.show');
Route::post('/update_announcement', [EventsController::class, 'update'])->name('announcement.update');
Route::post('/update_Event', [EventsController::class, 'update_event'])->name('Event.update');
Route::post('/update_Project', [EventsController::class, 'update_project'])->name('Project.update');
Route::post('/update_info', [EventsController::class, 'update_info'])->name('info.update');
Route::get('/info/fetch', [EventsController::class, 'fetchInfo'])->name('info.fetch');
Route::post('/export',  [ExportController::class, 'export'])->name('export');
Route::get('/get-image', [UserController::class, 'getImage'])->name('get.image');
Route::get('/get-projects', [UserController::class, 'getProjects'])->name('get.project');
Route::get('/get-news-events', [UserController::class, 'getNewsAndEvents'])->name('get.events');
// Route to get the official data for editing
Route::get('/officials/{id}/edit', [OfficialController::class, 'edit']);
// Route to update the official data
Route::post('/officials/{id}', [OfficialController::class, 'update']);











//Route::get('/admin/forum/{id}/comments', [AdminController::class, 'getCommentsForForum'])->name('admin.forum.comments');
//Route::middleware("auth")->group(function(){
Route::view('/userresident/index', 'userresident.index')->name('userresident.index');

//});


Route::get('/',[AuthController::class,"index"])->name('home');
Route::get('/',[IndexController::class,"index"])->name('home.index');
Route::get("/onlineservices",[AuthController::class,"onlineservices"])->name("onlineservices");
Route::get("/aboutus",[AuthController::class,"aboutus"])->name("aboutus");
Route::get("/login",[AuthController::class,"login"])->name("login");
// routes/web.php
Route::post('/check-email', [AuthController::class, 'checkEmail'])->name('check.email');

Route::get("/register",[AuthController::class,"register"])
->name("register");
Route::post('/send-otp', [AuthController::class, 'sendOTP']);
Route::post('/verify-otp', [AuthController::class, 'verifyOTP']);
Route::post('/register/step1', [AuthController::class, 'step1'])->name('register.step1');
Route::post('/register/step2', [AuthController::class, 'step2'])->name('register.step2');
Route::post('/register/step3', [AuthController::class, 'thirdStep'])->name('register.step3');
//Route::post('/register/storeMember',  [AuthController::class, 'storeMember'])->name('store.member');
Route::post('/save-face-scan', [AuthController::class, 'saveFaceScan']);
Route::post('/validate-face-id', [AuthController::class, 'validateFaceId']);

Route::post('/register/laststep', [AuthController::class, 'laststep'])->name('register.laststep');
Route::get('/forgotpass/{regnum}', function ($regnum) {
    return view('auth.forgotpass', ['regnum' => $regnum]);
})->name('password.reset');

Route::post('/forgotpass', [AuthController::class, 'resetPassword'])->name('password.update');
