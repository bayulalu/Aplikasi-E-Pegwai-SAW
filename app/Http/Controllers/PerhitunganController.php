<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Parameter;
use App\Models\Job;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index(){
       
        $users = User::where('eslon', '>' , '2')->has('parameters')->has('jobss')->get();
        /*
        normalisasi dengan cara 
        nilai / nilai max
        */
        
        // harus mendapatkan 3 niali 
        foreach ($users as $userSkp) {
           
            $user [] = $userSkp->name;
            $kualitas [] = collect($userSkp->jobss)->sum('kualitas'); 
            
            $kuantitas[] = $userSkp->jobss()->count();
            
            $waktu [] = collect($userSkp->jobss)->sum('nwaktu');
            // dd($waktu);

            foreach($userSkp->parameters as $pk){
                if ($pk->name == 'orientasi pelayanan') {
                    $op [] = $pk->pivot->nilai;  
                }
                if ($pk->name == 'integrasi') {
                    $integrasi [] = $pk->pivot->nilai;  
                }
                if ($pk->name == 'komitmen') {
                    $komitmen [] = $pk->pivot->nilai;  
                }
                if ($pk->name == 'disiplin') {
                    $disiplin [] = $pk->pivot->nilai;  
                }
                if ($pk->name == 'kerja sama') {
                    $ks [] = $pk->pivot->nilai;  
                }
                if ($pk->name == 'kepemimpinan') {
                    $kepemimpinan [] = $pk->pivot->nilai;  
                }      
            }

        }

        $kualitas;
        
        $nKulitas = $this->normalisai($kualitas);
       
        $kuantitas; 
        $nKuantitas = $this->normalisai($kuantitas);
        // dd($nKuantitas);
        $waktu;
        $nWaktu = $this->normalisai($waktu);
        // dd($waktu);
        $integrasi;
        $nIntegrasi = $this->normalisai($integrasi);

        $komitmen;
        $nKomitmen = $this->normalisai($komitmen);
        
        $disiplin;
        $nDisiplin = $this->normalisai($disiplin);

        $ks;
        $nKs = $this->normalisai($ks);

        $kepemimpinan;   
        $nKepemimpinan = $this->normalisai($kepemimpinan);

        /*
        === perengkingan dan pembobotan ===
        1.menguah bentuk persen dari bobot menjadi satuan 
        2.bentuk satuan dari bobot * nilai normalisasi + 
          semua nilai parameter
        */

        // mengubah btk persen ke satuan
        $prms = Parameter::all();
        foreach ($prms as $prm ) {
            $prmss[] = $prm->bobot / 100;
        }
        $prmss;
        $jumlah []= 0;
        // perhitungan rengking bobot * nilai normal + bnyak pram (pisah)
        
       for ($i=0; $i <= count($prmss) ; $i++) {
           
           for ($j=0; $j < count($nKulitas); $j++) { 
               if ($j == $i) {
                $jumlah[$i] = $prmss[$i] * $nKulitas[$j]; 
               }
            
           } 
       }
       $jumlah;
       $nilais = array_combine($user, $jumlah);
    //    $nilais = asort($jumlah);
    //    dd($nilais);
     
        return view('spk.pegawaiTerpilih', compact('nilais'));
    }

    // perhitungan normalisasi
    public function normalisai($nilai)
    {
        
       $nilaiMax = max($nilai) ;

       foreach ($nilai as $key => $value) {
           $nilaiNormal[] = $value / $nilaiMax; 
       }
       return $nilaiNormal;
    }
}
