<?php declare(strict_types=1);

namespace AppBundle\Entity;

class FeedEntry
{
    /**
     * @var string $newsId Id of external content, used to check i the news was already added
     */
    protected $newsId;

    /**
     * @var FeedSource $feedSource
     */
    protected $feedSource;

    /**
     * @var string $title
     */
    protected $title;

    /**
     * @var string $content
     */
    protected $content;

    /**
     * @var string $sourceUrl
     */
    protected $sourceUrl;

    /**
     * @var \DateTime $date News date (not the date when collected)
     */
    protected $date;

    /**
     * @var \DateTimeImmutable $collectionDate When the news was fetched
     */
    protected $collectionDate;

    /**
     * @var string $language
     */
    protected $language;

    /**
     * @var array $tags
     */
    protected $tags = [];

    /**
     * Creates an instance (allows to keep the entity immutable)
     *
     * @param array $attributes
     * @return FeedEntry
     */
    public static function create(array $attributes) : FeedEntry {
        $feed = new self();

        foreach ($attributes as $attributeName => $value) {
            $methodName = 'set' . ucfirst($attributeName);

            if (!method_exists($feed, $methodName)) {
                throw new \InvalidArgumentException('"' . $attributeName . '" is not a valid attribute name');
            }

            $feed->$methodName($value);
        }

        return $feed;
    }

    public function getNewsId() : string
    {
        return $this->newsId;
    }

    public function getFeedSource() : FeedSource
    {
        return $this->feedSource;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function getDate() : \DateTimeImmutable
    {
        return $this->date;
    }

    public function getCollectionDate() : \DateTimeImmutable
    {
        return $this->collectionDate ?? new \DateTimeImmutable();
    }

    public function getLanguage() : string
    {
        return $this->language ?? '';
    }

    public function getTags() : array
    {
        return $this->tags;
    }

    protected function setFeedSource($feedSource) : FeedEntry
    {
        $this->feedSource = $feedSource;
        return $this;
    }

    public function setTitle($title) : FeedEntry
    {
        $this->title = $title;
        return $this;
    }

    public function setDate($date) : FeedEntry
    {
        $this->date = $date;
        return $this;
    }

    public function setCollectionDate($collectionDate) : FeedEntry
    {
        $this->collectionDate = $collectionDate;
        return $this;
    }

    public function setLanguage($language) : FeedEntry
    {
        $this->language = $language;
        return $this;
    }

    public function setTags($tags) : FeedEntry
    {
        $this->tags = $tags;
        return $this;
    }

    public function setNewsId($newsId) : FeedEntry
    {
        $this->newsId = $newsId;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content) : FeedEntry
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSourceUrl()
    {
        return $this->sourceUrl;
    }

    public function setSourceUrl($sourceUrl) : FeedEntry
    {
        $this->sourceUrl = $sourceUrl;
        return $this;
    }

    public function __toString(): string
    {
        return 'FeedEntry:' . $this->getNewsId();
    }
}
