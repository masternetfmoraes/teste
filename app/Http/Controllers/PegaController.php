<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class PegaController extends Controller
{
    //
    public function Pega(){
        //inicio
        
        //$url = 'https://comandotorrents.io/';
        $url = 'https://flixtorrent.net/animacao/page/3/';

        $client = new Client();

        $crawler = $client->request('GET', $url);
        for ($x = 0; $x <= 30 ; $x++) {
           // echo "The number is: $x <br>";
        
        // Obter o título do primeiro filme listado na página
        //$tituloFilme = $crawler->filter('div.title')->first()->text();
        $tituloFilme = $crawler->filter('div.title')->slice($x)->text();
        /********/
        $elementoDiv = $crawler->filter('div.img')->slice(-$x);

            // Obtém o valor do atributo "style" do elemento <div>
            $valorStyle = $elementoDiv->attr('style');

            // Usa expressões regulares para obter a URL da imagem contida no estilo CSS
            preg_match('/url\((.*?)\)/', $valorStyle, $matches);
            $urlImagem = $matches[1];

            // Exibe a URL da imagem
            echo $tituloFilme."<hr>";

            //echo '<img src="'.$urlImagem.'" style="width: 150;heigth: 450;"><hr>';
            // Faz o download da imagem para o seu servidor
            //$conteudoImagem = file_get_contents($urlImagem);
            //$imagem_salva= 'imagem2023-'.$x;
            //file_put_contents($imagem_salva.'.jpg', 'storage/app/pubic/'.$conteudoImagem);
        /*******/
        //echo 'Magnet: ' . $magnetFilme . '<br>';
        }
        //fim
    }

    public function PegaImg(){
        //inicio
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.imdb.com/title/tt13051810/mediaviewer/rm1356664577/?ref_=tt_ov_i');

        // Selecione o elemento HTML que contém a imagem do filme
        $imagemFilme = $crawler->filter('sc-7c0a9e7c-0 fEIEer peek')->first();

        // Obtenha a URL da imagem usando o atributo "src"
        $urlImagemFilme = $imagemFilme->attr('src');

        echo $urlImagemFilme ;
        // Faça o download da imagem para o seu servidor
        //file_put_contents('imagem_filme.jpg', file_get_contents($urlImagemFilme));
        //fim
    }

    public function exibe(){
        echo '<img src="imagem2023-1.jpg">';
    }

    public function BackUp(){
        //inicio
        
        $url = 'https://comandotorrents.io/';

        $client = new Client();

        $crawler = $client->request('GET', $url);

        // Obter o título do primeiro filme listado na página
        $tituloFilme = $crawler->filter('div.title')->first()->text();

        // Obter o magnet do primeiro filme listado na página
        //$magnetFilme = $crawler->filter('div.post-content div.entry-content p a[href^="magnet"]')->first()->attr('href');

        echo 'Título do Filme: ' . $tituloFilme . '<br>';
        //echo 'Magnet: ' . $magnetFilme . '<br>';
        //fim
    }

}