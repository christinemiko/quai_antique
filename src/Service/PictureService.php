<?php

 namespace App\Service;

 use Exception;
 use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
 use Symfony\Component\HttpFoundation\File\UploadedFile;
 use function PHPUnit\Framework\throwException;

 class PictureService
 {
     private ParameterBagInterface $params;

     public function __construct(ParameterBagInterface $params)
     {
         $this->params = $params;
     }

     /**
      * @throws Exception
      */
     public function add(UploadedFile $picture, ?string $folder = '', ?int
                                      $width = 250, ?int $height = 250)
     {
         $file = md5(uniqid(mt_rand(), true)) . '.webp';

         $picture_infos = getimagesize($picture);

         if($picture_infos === false){
             throw new \RuntimeException('Format d\'image incorrect');
         }

         switch($picture_infos['mime']){
             case 'image/png':
                 $picture_source = imagecreatefrompng($picture);
                 break;
             case 'image/jpeg':
                 $picture_source = imagecreatefromjpeg($picture);
                 break;
             default:
                 throw new \RuntimeException('Format d\'image incorrect');
         }

         $imageWidth = $picture_infos[0];
         $imageHeight = $picture_infos[1];

         switch ($imageWidth <=> $imageHeight){
             case -1: //portrait
                 $squareSize = $imageWidth;
                 $src_x = 0;
                 $src_y = ($imageHeight - $squareSize) / 2;
                 break;
             case 0: //carré
                 $squareSize = $imageWidth;
                 $src_x = 0;
                 $src_y = 0;
                 break;
             case 1: //paysage
                 $squareSize = $imageHeight;
                 $src_y = ($imageWidth - $squareSize) / 2;
                 $src_x = 0;
                 break;
         }
         $resized_picture = imagecreatetruecolor($width, $height);
         imagecopyresampled($resized_picture, $picture_source, 0, 0,
         $src_x, $src_y, $width, $height, $squareSize, $squareSize);

         $path = $this->params->get('pictures_directory') . $folder;

          if(!file_exists($path . '/mini/')){
              if (!mkdir($concurrentDirectory = $path . '/mini/', 0755, true) && !is_dir($concurrentDirectory)) {
                  throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
              }
          }


         imagewebp($resized_picture, $path . '/mini/' . $width . 'x' . $height . '-' . $file);

          $picture->move($path . '/', $file);

          return $file;
     }

 }