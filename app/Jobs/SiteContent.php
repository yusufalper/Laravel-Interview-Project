<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\CompanyWebSite;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SiteContent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $company_id, $internet_address;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($company_id, $internet_address)
    {
        $this->company_id = $company_id;
        $this->internet_address = $internet_address;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $company_id = $this->company_id;
        $internet_address = $this->internet_address;
        $siteHTMLContent = file_get_contents($internet_address);

        $site_content = CompanyWebSite::where('company_id', $company_id)->first();

        if (!isset($site_content)) {

            $site_content = new CompanyWebSite();

            $site_content->company_id = $company_id;
            $site_content->site_content = $siteHTMLContent;
            $site_content->save();
        }

        $site_content->site_content = $siteHTMLContent;
        $site_content->save();
        return $site_content;
    }
}
