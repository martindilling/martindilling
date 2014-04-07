<?php

use Faker\Factory as Faker;
use MDH\Entities\User;

class CreationsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        $user = User::find(1);

        foreach(range(1, 20) as $index)
        {
            $title = $faker->sentence(3);
            $user->creations()->create([
                'title'        => $index == 1 ? 'First creation' : $title,
                'slug'         => $index == 1 ? 'first-creation' : Str::slug($title),
                'weblink'      => $index == 1 ? 'http://martindilling.com' : (rand(0, 1) ? $faker->url() : null),
                'image'        => $faker->randomElement($array = array('1_full.png','2_full.png','3_full.png','4_full.png')),
                'thumb'        => $faker->randomElement($array = array('1_thumb.png','2_thumb.png','3_thumb.png','4_thumb.png')),
                'body'         => $index == 1 ? $this->getMdText() : $faker->text(500),
                'publish_at'   => $index == 1 ? $faker->dateTimeBetween('-1 hour', 'now') : $faker->dateTimeBetween('-30 days', '+5 days'),
            ]);
        }
    }
    
    public function getMdText()
    {
        return '# Modo censu

<p><a name="si-quicquid-igitur"></a></p>
## Si quicquid igitur

Lorem markdownum quae venenifero an vellet cursu: patresque conspectior Diana:
modo Proetidas [praecipue vitae](http://en.wikipedia.org/wiki/Sterling_Archer)?
Terrarumque proque Phoebus incepta caesumque variat
magnanimi restat flumine liquores hos.

> Facie fuga, quod tendit hic rapuere diro illos munera?
> Ore concedimus cedite saepe peraravit Phlegyis, ab videt temptat
> commissaque Peleu; est tamen clamavit lustrat nocte! In dicta harundine nempe!

<p><a name="umbras-et-ad-natura"></a></p>
## Umbras et ad natura

<figure>
    <img src="http://placehold.it/500x200" alt="500x200">
    <figcaption>Some related image here.</figcaption>
</figure>

Inhibere gesserit ingredior quid locum validoque quam; pater *suis auctor
negant*. Laborum dixit Aeolia, morsu certe proque litore tamen, pro nutrix,
Phrygiisque vota! More sed *infelix Sabaea*.

* Lactisque orbem 
* Mente inplet manes ferarum laborum
* Ira cumulemus optes, dei humum beatam
* Cornua Carmina in dantem nisi rapiunt

<p><a name="mihi-nec-et-mors-carchesia-at-non"></a></p>
## Mihi nec et mors carchesia at non

Unde pericli quam exemploque silvis, cur [penset fetus
tale](http://reddit.com/r/thathappened) Oete **rerum volvitur parte** sed uris.
Certe igitur se nova subscribi gravis superando nomen?

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Post::$rules);
    
        if ($validation->passes())
        {
            $this->post->create($input);
    
            return Redirect::route(\'post.index\');
        }
    
        return Redirect::route(\'post.create\')
            ->withInput()
            ->withErrors($validation)
            ->with(\'message\', \'There were validation errors.\');
    }

<p><a name="adfusaque-ferventibus-profundi-iove"></a></p>
## Adfusaque ferventibus profundi Iove

Face Hebrum totidem solutum Sisyphe natarum, satis, calidis, Dite matri,
monstra! Fit mox munere, quam instare, ad genibus laeva superos habet, est
Themi. Scylla crudelia in solus eadem, maius domino verborum, recessit ne cruori
terra lumina, per.

1. Amphitryon mecum
2. Ab pugnatum ego
3. Imperat tacebitur amores

<p><a name="notis-diversaque-arvis-aprum-repetito-illum"></a></p>
## Notis diversaque arvis aprum repetito illum

Moveant arbore sol uti auras, adnuat est clam dictoque, pectore non, fluunt,
adit. Nomina currus *alto demptos*: illic cum Rhodon **omnes tamen semper**
petis [hostem](http://zombo.com/) aut. Est Alcides matura. Qui quid
[sub](http://news.ycombinator.com/) mihi!

Et cum. Possederat vocet exsiluere; qua ne Cyparissus sidereum, remansit! Celer
est per spoliantis arma *generosque* resto: aequore placet Bacchica vixque ubi:
ubi? Tectis est Phoebi fallat, mihi sed ludere fronte: videt.

[Terrarumque proque]: http://zeus.ugent.be/
[hostem]: http://zombo.com/
[penset fetus tale]: http://reddit.com/r/thathappened
[praecipue vitae]: http://en.wikipedia.org/wiki/Sterling_Archer
[sub]: http://news.ycombinator.com/';
    }

}
