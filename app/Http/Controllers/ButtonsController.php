<?php

namespace App\Http\Controllers;

use App\Http\Requests\ButtonUpdateRequest;
use App\Http\Resources\ButtonCollection;
use App\Http\Resources\ButtonResource;
use App\Models\Button;
use Illuminate\Http\Resources\Json\JsonResource;

class ButtonsController extends Controller
{
    public function list(): JsonResource
    {
        return new ButtonCollection(Button::all());
    }

    public function show(string $id): JsonResource
    {
        $button = new ButtonResource(Button::findOrFail($id));
        return $button;
    }

    public function update( string $id, ButtonUpdateRequest $request): JsonResource
    {
        $button = Button::findOrFail($id);

        $button->update([
            'title' => $request->title,
            'link' => $request->link,
            'color' => $request->color,
        ]);

        return new ButtonResource($button);
    }

    public function clear(string $id): JsonResource
    {
        $button = Button::findOrFail($id);

        $button->update([
            'title' => null,
            'link' => null,
            'color' => null,
        ]);

        return new ButtonResource($button);
    }
}
