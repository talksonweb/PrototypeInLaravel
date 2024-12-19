<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagsFactory> */
    use HasFactory;

    public function deepClone(): self
    {
        // Create a shallow copy of the model
        $clone = $this->replicate();

        // Save the cloned model to assign it a new primary key
        $clone->save();

        // Iterate over each loaded relationship and recursively clone them
        foreach ($this->getRelations() as $relationName => $relationModels) {
            if ($relationModels instanceof Model) {
                // Single related model
                $clone->{$relationName}()->associate($relationModels->deepClone());
            } elseif ($relationModels instanceof \Illuminate\Database\Eloquent\Collection) {
                // Collection of related models
                $clonedRelations = $relationModels->map(fn ($model) => $model->deepClone());
                $clone->{$relationName}()->saveMany($clonedRelations);
            }
        }

        return $clone;
    }
}
