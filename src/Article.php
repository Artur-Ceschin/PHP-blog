<?php 

class Article
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function showAll(): array
    {
        $resultado = $this->mysql->query('SELECT id, titulo, conteudo FROM artigos');
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);
        return $artigos;
    }

    public function add(string $titulo, string $conteudo ) : void
    {
        $inseriArtigo = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo) VALUES (?,?);');
        $inseriArtigo->bind_param('ss', $titulo, $conteudo);
        $inseriArtigo-> execute();
    }

    public function delete (string $id) : void
    {   
        $removerArtigo = $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');
        $removerArtigo->bind_param('s', $id);   
        $removerArtigo->execute();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
    }

    public function findId(string $id) : array
    {
        $selecionaArtigo = $this->mysql->prepare("SELECT id, titulo, conteudo FROM artigos WHERE id = ?");
        $selecionaArtigo->bind_param('s', $id);
        $selecionaArtigo->execute();
        $artigo = $selecionaArtigo->get_result()->fetch_assoc();
        return $artigo;
    }
    public function edit(string $id, string $titulo, string $conteudo) : void
    {
        $editarArtigo = $this->mysql->prepare("UPDATE artigos SET titulo = ?, conteudo = ? WHERE id = ?");
        $editarArtigo->bind_param('sss', $titulo, $conteudo, $id);
        $editarArtigo->execute();
    }
}



