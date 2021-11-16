<?php 

    require('fpdf/fpdf.php');

    class PDF extends FPDF
    {
        //Cabecera de pagina
        function Header()
        {
            //Logo
            $this->Image('Views/Images/utn.jpg',10,8,33);
            //Arial bold 15
            $this->SetFont('Arial','B',15);
            //Movernos a la derecha
            $this->Cell(80);
            //Titulo
            $this->Cell(30,10,'Hola',1,0,'C');
            //Salto de linea
            $this->Ln(20);
        }

        //Pie de pagina
        function Footer()
        {
            //Posicion: a 1,5 cm del final
            $this->SetY(-15);
            //Arial italic 8
            $this->SetFont('Arial','I',8);
            //Numero de pagina
            $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    //Creacion del objeto de la clase heredada
    
        ob_start();
        
        $pdf = new FPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);

        $pdf->Output();
        ob_end_flush(); 
?>




   



