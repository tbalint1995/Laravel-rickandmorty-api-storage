<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Episode;
use GuzzleHttp\Client;
use Illuminate\Http\RedirectResponse;

class APIController extends Controller
{
    private $client, $episodes = [];

    function __construct()
    {
        set_time_limit(0);

        $this->client = new Client();
        $this->getEpisodes();
    }

    /**
     * Lekéri az epizódokat az API-ból és tárolja őket az $episodes tömbben.
     *
     * @return void
     */
    private function getEpisodes(): void
    {
        $page = 1;

        do {
            $obj = json_decode($this->client
                ->request('GET',  'https://rickandmortyapi.com/api/episode?page=' . $page)
                ->getBody());

            $this->episodes = array_merge($this->episodes, $obj->results);
            $page++;
        } while ($page <=  $obj->info->pages);
    }

    /**
     * Lekéri egy karaktert az API-ból egy URL alapján.
     *
     * @param mixed $url
     * @return mixed
     */
    private function getCharacter($url): mixed
    {
        return json_decode($this->client
            ->request('GET',  $url)
            ->getBody());
    }

    /**
     * Szinkronizálja az epizódokat és karaktereket az adatbázissal.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    function sync(): RedirectResponse
    {
        foreach ($this->episodes as $item) {
            $new_episode = Episode::updateOrCreate(
                ['episode' => $item->episode],
                [
                    'name' => $item->name,
                    'air_date' => $item->air_date,
                    'url' => $item->url,
                    'created' => $item->created
                ]
            );

            foreach ($item->characters as $char_url) {
                $char = $this->getCharacter($char_url);
                $new_character = Character::updateOrCreate(
                    ['name' => $char->name],
                    [
                        'status' => $char->status,
                        'species' => $char->species,
                        'type' => $char->type,
                        'gender' => $char->gender,
                        'image' => $char->image,
                    ]
                );

                $new_episode->characters()->syncWithoutDetaching($new_character->id);
            }
        }
        return redirect()->back();
    }
}
