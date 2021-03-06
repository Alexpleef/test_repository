<?php
namespace Service;
use Entity\Article;
use InterfaceNamespace\EntityManagerInterface;
use Entity\BaseEntity;
class ArticleManager implements EntityManagerInterface
{
    private $db;
    public function setDb(DbManager $db)
    {
        $this->db = $db;
    }
    public function getById(int $id)
    {
        $article_query = $this->GetArticleById($id);
        if ($article_query->num_rows) {
            foreach ($article_query->rows as $row) {
                $data['title'] = $row['title'];
                $data['text'] = $row['text'];
            }
                $article = new Article($data['title'], $data['text']);
                $article->setId($id);
                return $article;
            } else {
                return null;
            }
        }

private function getArticleID(int $id)
{
    $article = $this->GetArticleById($id);
    if ($article->num_rows) {
        return true;
    } else {
        return false;
    }
}
public function save(BaseEntity $object)
{
    $id = $object->getId();
    $data['title'] = $object->getTitle();
    $data['text'] = $object->getText();
    $data['id'] = $id;
    if ($this->getArticleID($id)) {
        $this->UpdateArticle($data);
    } else {
        $this->AddArticle($data);
    }
}
private function GetArticleById(int $id)
{
    return $this->db->query("SELECT * FROM articles WHERE id = '" . $id . "'");
}
private function UpdateArticle(array $data)
{
    $query = "UPDATE articles SET title = '" . $this->db->escape($data['title']) . "', text = '" . $this->db->escape($data['text']) . "' WHERE id='" . (int)$data['id'] . "'";
    $this->db->query($query);
}
private function AddArticle(array $data)
{
    $query = "INSERT INTO articles SET title = '" . $this->db->escape($data['title']) . "', text = '" . $this->db->escape($data['text']) . "', id = '" . $this->db->escape($data['id']) . "'";
    $this->db->query($query);
}
}