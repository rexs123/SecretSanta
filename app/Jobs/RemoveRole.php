<?php

namespace App\Jobs;

use App\Group;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use RestCord\DiscordClient;

class RemoveRole implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var \App\User
     */
    protected $user;

    /**
     * @var \App\Jobs\Group
     */
    protected $group;

    /**
     * Create a new job instance.
     *
     * @param \App\User $user
     * @param \App\Group $group
     */
    public function __construct(User $user, Group $group)
    {
        $this->user = $user;
        $this->group = $group;
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

        $discord->guild->removeGuildMemberRole([
            'guild.id' => (int) env('DISCORD_GUILD_ID'),
            'user.id' => $this->user->discord_id,
            'role.id' => (int) $this->group->role_id
        ]);
    }
}
