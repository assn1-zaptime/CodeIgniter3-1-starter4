<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends Application
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/
	 * 	- or -
	 * 		http://example.com/welcome/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $cat1 = imagecreatefrompng('data/eyeball.png');
            $cat2 = imagecreatefromjpeg('data/nose.jpg');
            $cat3 = imagecreatefrompng('data/mouth.png');
            $base = imagecreatefrompng('data/Face.png');

            imagealphablending($base, false);
            imagesavealpha($base, true);
            
            imagecopymerge($base, $cat1, 95,120, 20, 100, 220, 110, 100);
            imagecopymerge($base, $cat2, 155,230, 0, 5, 100, 90, 100);
            imagecopymerge($base, $cat3, 155,300, 10, 10, 100, 80, 100);

            header('Content-Type: image/png');
            imagepng($base);

            imagedestroy($base);
            imagedestroy($cat1);
            imagedestroy($cat2);
            imagedestroy($cat3);
            
            $this->data['pagebody'] = 'catalog';
            $this->render(); 
	}

}
