<?php namespace Modules\Media\Traits;

use Modules\Site\Facades\SiteGateway;
use \Site;

trait MultiSiteTenancyTrait {

    public function newQuery()
    {
        $query = parent::newQuery();
        if (is_module_enabled('Site')) {
            $this->appendWhereClause($query);
        }

        return $query;
    }

    private function appendWhereClause($query) {
      $siteId = Site::id();
      if(!empty($siteId)) {
          $query->where('site_id', '=', $siteId);
      }
    }
}
