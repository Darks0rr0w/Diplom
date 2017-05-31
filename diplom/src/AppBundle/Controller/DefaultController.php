<?php

namespace AppBundle\Controller;

use AppBundle\Classes\ActualOutputDataProvider;
use AppBundle\Classes\ApproxOutputDataProvider;
use AppBundle\Classes\FileParser;
use AppBundle\Classes\FileReader;
use AppBundle\Classes\MathLabRunner;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [

        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/upload", name="upload_file")
     */
    public function uploadAction(Request $request)
    {

        /** @var UploadedFile $file */
        $file = $request->files->get('file');
        $uploadDir = realpath($this->get('kernel')->getRootDir() . '/../web/uploads');
        $file->move($uploadDir, $file->getClientOriginalName());
        $newPath = $uploadDir . '/' . $file->getClientOriginalName();
        $test = new FileReader($newPath);
        $content = $test->read();
        $fileParser = new FileParser();
        $fileParser->saveFilesToMathLab($content);
        $mathLabRunner =  new MathLabRunner();
        $mathLabRunner->execute();
        $dataActual = '';
        $dataAppox = '';
        foreach (ActualOutputDataProvider::getFileNames() as $fileName) {
            $dataActual[] = trim(file_get_contents(MathLabRunner::PATH_TO_M_FILE . '/' . $fileName));
        };
        foreach (ApproxOutputDataProvider::getFileNames() as $fileName) {
            $dataAppox[] = trim(file_get_contents(MathLabRunner::PATH_TO_M_FILE . '/' . $fileName));
        }
        return $this->render('default/index.html.twig', [
            'actual' => $dataActual,
            'approx' => $dataAppox
        ]);
    }
}
