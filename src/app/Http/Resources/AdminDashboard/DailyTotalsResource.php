<?php

namespace App\Http\Resources\AdminDashboard;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DailyTotalsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'new_leads'     => $this['total_new_leads'] ?? 0,
            'new_users'     => $this['total_new_users'] ?? 0,
            'new_messages'  => $this['total_new_messages'] ?? 0,
        ];
    }
}
