<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\CvModel;
class CvController extends BaseController
{

  protected $cvModel;

  public function __construct()
  {
      $this->cvModel = new CvModel();
  }

  public function index()
  {
    $cvs = $this->cvModel->getCvs();
    $data = [
        'title' => 'CV Data',
        'cvs' => $cvs,
    ];
    return view("super_admin/cv/index", $data);
  }

  public function create()
  {
      return view("super_admin/cv/create");
  }

  public function store()
  {
      $this->cvModel->insert([
        'name' => $this->request->getPost('name'),
        'title' => $this->request->getPost('title'),
        'address' => $this->request->getPost('address'),
        'phone' => $this->request->getPost('phone'),
        'email' => $this->request->getPost('email'),
        'about' => $this->request->getPost('about'),
      ]);

      return redirect('super_admin/cv')->with('success', 'Data Added Successfully');
  }

  public function update()
  {
      $id = $this->request->getPost('id');

      $this->cvModel->update($id, [
        'name' => $this->request->getPost('name'),
        'title' => $this->request->getPost('title'),
        'address' => $this->request->getPost('address'),
        'phone' => $this->request->getPost('phone'),
        'email' => $this->request->getPost('email'),
        'about' => $this->request->getPost('about'),
      ]);

      return redirect('super_admin/cv')->with('success', 'Data Update Successfully');
  }

  public function delete()
  {
      $id = $this->request->getPost('id');

      $this->cvModel->delete($id);

      return redirect('super_admin/cv')->with('success', 'Data Deleted Successfully');
  }

  public function pdf() {
    $id = $this->request->getPost('id');
    $cv = $this->cvModel->where('id', $id)->first();
    $data = array(
      'cv' => $cv
    );
    $mpdf = new \Mpdf\Mpdf();
    $html = view('super_admin/cv/pdf', $data);
    $mpdf->WriteHTML($html);
    $this->response->setHeader('Content-Type', 'application/pdf');
    // $mpdf->Output('cv.pdf','I'); // opens in browser
    $mpdf->Output('cv.pdf','D'); // it downloads the file into the cv system, with give name
    return true;
  }
}
