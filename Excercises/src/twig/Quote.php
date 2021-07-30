<?php


namespace App\twig;



use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class Quote extends AbstractExtension
{
public $quotes = [
"“Two things are infinite: the universe and human stupidity; and I'm not sure about the universe.”
― Albert Einstein",
"“Darkness cannot drive out darkness,
    only light can do that. 
    Hate cannot drive out hate, 
    only love can do that.”
― Martin Luther King Jr., A Testament of Hope: The Essential Writings and Speeches ",
"“Be the change that you wish to see in the world.”
― Mahatma Gandhi",
"“If you want to know what a man's like, take a good look at how he treats his inferiors, not his equals.”
― J.K. Rowling, Harry Potter and the Goblet of Fire",
"“Use lots of quotation signs, they make you look wiser.”
    - Koen Eelen"
];

    public function randQuote(){
        return $this->quotes[array_rand($this->quotes)];
 /*       return [new TwigFilter('price', [AppRuntime::class, 'formatPrice']),];*/
    }
}