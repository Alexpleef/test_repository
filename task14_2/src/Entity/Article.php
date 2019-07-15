<?php
namespace Entity;

/**
 * Class Article
 * @package Entity
 */
class Article extends BaseEntity
{
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $text;
    /**
     * @var BaseEntity
     */
    private $user;

    /**
     * Article constructor.
     * @param string $title
     * @param string $text
     * @param BaseEntity $user
     */
    public function __construct(string $title, string $text, BaseEntity $user)
    {
        $this->title = $title;
        $this->text = $text;
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}
