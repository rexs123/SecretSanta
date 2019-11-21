<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use RestCord\DiscordClient;

class RemoveDiscord implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var \App\User
     */
    protected $user;

    /**
     * Create a new job instance.
     *
     * @param \App\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @param \App\User $user
     * @return void
     */
    public function handle(User $user)
    {
        $discord = new DiscordClient([
            'token' => env('DISCORD_BOT_TOKEN'),
            'tokenType' => 'Bot'
        ]);

        $discord->guild->removeGuildMember([
            'guild.id' => (int) env('DISCORD_GUILD_ID'),
            'user.id' => $this->user->discord_id,
        ]);
    }
}
