<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = config('certificates.certificates');
        return view('pages.landing', compact('certificates'));
    }

    public function show($id)
    {
        $allCertificates = config('certificates.certificates');
        $certificate = collect($allCertificates)->firstWhere('id', $id);

        if (!$certificate) {
            abort(404);
        }

        return view('pages.certificate_detail', compact('certificate'));
    }
}
