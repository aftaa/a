<?php


namespace storage;

use builder\LinkBlockBuilderInterface;
use entity\LinkBlockDb;
use factory\IconFactory;
use PDO;
use vo\DbLink;
use vo\LoadedFavicon;

class LinkBlockPdoStorage implements LinkBlockStorageInterface
{
    /** @var \PDO */
    private $dbh;

    /**
     * @param \PDO $dbh
     */
    public function setDbh(\PDO $dbh): void
    {
        $this->dbh = $dbh;
    }

    /**
     * @param int $limit
     * @return array|LinkBlockDb
     */
    public function getTopN(int $limit)
    {
        $dbh = $this->dbh;
        $query = "SELECT COUNT(l.id) AS cnt, l.* 
                    FROM link_view lv JOIN link l ON l.id=link_id 
                    GROUP BY l.id ORDER BY cnt DESC, l.name LIMIT $limit";
        $sth = $dbh->query($query, PDO::FETCH_OBJ);

        $linkBlockDb = new LinkBlockDb("my top", []);
        foreach ($sth as $row) {
            $icon = IconFactory::getIcon($row->icon, $row->href);
            $link = new DbLink(
                $row->name,
                $row->href,
                $row->private,
                new LoadedFavicon($row->name, $icon->getHref()),
                $row->id
            );
            $link->views = $row->cnt;
            $linkBlockDb->addLink($link);
        }
        return $linkBlockDb;
    }

    /**
     * @param LinkBlockBuilderInterface $builder
     * @return array|LinkBlockDb[]
     */
    public function getAll(LinkBlockBuilderInterface $builder): array
    {
        $dbh = $this->dbh;

        $result = $dbh->query("SELECT *, l.name AS name, b.name AS block_name, l.id AS link_id 
            FROM link l JOIN link_block b ON link_block_id=b.id ORDER BY l.name", PDO::FETCH_OBJ);

        /** @var LinkBlockDb[] $blocks */
        $blocks = [];
        foreach ($result as $row) {

            $blockName = $row->block_name;

            if (!array_key_exists($blockName, $blocks)) {
                $blocks[$blockName] = new LinkBlockDb($blockName, null);
            }

            $icon = IconFactory::getIcon($row->icon, $row->href);

            $link = new DbLink(
                $row->name,
                $row->href,
                $row->private,
                new LoadedFavicon($row->name, $icon->getHref()),
                $row->link_id,
                );
            $blocks[$blockName]->addLink($link);
        }
        return $blocks;
    }
}


