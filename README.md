Tenolo OpenGraphBundle
=======================================

The TenoloOpenGraphBundle is a simple way to improve how you manage OpenGraph
into your Symfony2 application.

> **Note**: OpenGraph is a standard protocol used by many websites (Facebook,
> Twitter, Google, ...) to obtain more precise informations about your content.
>
> [Learn more about OpenGraph](http://ogp.me/)

The idea of this bundle it to associate each entity of your app with an **OpenGraph
map**, a service able to create the OpenGraph document for your entity.

It also works with any other type of data.

Installation
------------

Installation is very quick:

### 1. Download it with Composer

Add the bundle to your `composer.json` file by running:

`composer require tenolo/open-graph-bundle`

### 2. Enable it in your kernel

Enable the bundle in your `app/AppKernel.php` file;

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Tenolo\Bundle\OpenGraphBundle\TenoloOpenGraphBundle(),
    );
}
```


Usage
-----

The TenoloOpenGraphBundle will associate:

- **Entities** of your application with ...
- ... or **Other Data like an array** of your application with ...
- **OpenGrap maps**, definitions of these entities in an OpenGraph way


Let's take an example for a better understanding: a blog post.

### Your entity

For a blog post, you could have an entity like this one:

``` php
<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity
 */
class BlogPost
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;
}
```

### Its OpenGraph map

The map associated with your entity will be a class implementing
`Tenolo\Bundle\OpenGraphBundle\Map\OpenGraphMapInterface` and the two required methods of this interface :
`map(DocumentWriterInterface $document, $data)` and `supports($data)`.

For instance, our map could look like this :

``` php
<?php

namespace Acme\DemoBundle\OpenGraph;

use Acme\DemoBundle\Entity\BlogPost;
use Tenolo\Bundle\OpenGraphBundle\OpenGraph\DocumentWriterInterface;
use Tenolo\Bundle\OpenGraphBundle\Map\OpenGraphMapInterface;
use Opengraph\Opengraph;

class BlogPostMap implements OpenGraphMapInterface
{

    /**
     * @inheritdoc
     * @var BlogPost $data
     */
    public function map(DocumentWriterInterface $document, $data)
    {
        $document->append(OpenGraph::OG_SITE_NAME, 'MyBlog');
        $document->append(OpenGraph::OG_TYPE, OpenGraph::TYPE_ARTICLE);
        $document->append(OpenGraph::OG_TITLE, $data->getTitle());
    }

    /**
     * @inheritdoc
     */
    public function supports($data)
    {
        return $entity instanceof BlogPost;
    }
}
```

The `supports` method declares with what kind of entities this map is able to deal.
The `map` method create an OpenGraph document representing the given entity.

Once created, we still have to register our class into the OpenGraph manager. To do so,
we will have to use the tag `tenolo_open_graph.map`:

``` yml
services:
    acme_demo.open_graph.blog_post_map:
        class: Acme\DemoBundle\OpenGraph\BlogPostMap
        tags:
            - { name: tenolo_open_graph.map }
```

### Using the map

Our map is registered, so we can use it anywhere we want to render it.
For instance, with Twig:


``` html
<html>
    <head>
        <title>Blog post</title>

        {{ opengraph_render(blogPost) }} <!-- blogPost should be an instance of BlogPost -->
    </head>
    <body>
        ...
    </body>
</html>
```

> **Note**: if no map is able to deal with the entity given in `opengraph_render`,
> an `NotSupported` exception will be thrown.

> **Another Note**: Credits and inspiration goes to [tgalopin](https://github.com/tgalopin/OpenGraphBundle) 

> just saying ;)