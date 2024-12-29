<?php namespace Webpage\Frontend\Classes;

use Site, Cache;
use Webpage\Frontend\Models\Setting;

class SettingsCache {
    private const CACHE_SETTINGS_PREFIX = 'frontend_settings_site_';

    public static function getSettingsCache(): ?Setting {
        [$cacheName, $siteId] = self::generateSiteCacheInfo();
        return self::cacheSettings($cacheName, $siteId);
    }

    public static function setSettingsCache(): void {
        [$cacheName, $siteId] = self::generateSiteCacheInfo();
        Cache::forget($cacheName);
        self::cacheSettings($cacheName, $siteId);
    }

    private static function cacheSettings($cacheName, $siteId): ?Setting {
        return Cache::rememberForever($cacheName, function() use($siteId) {
            return Setting::where('site_id', $siteId)->first();
        });
    }

    private static function generateSiteCacheInfo(): array {
        $siteId = Site::getSiteFromContext()->id;
        $cacheName = self::CACHE_SETTINGS_PREFIX . $siteId;

        return [
            $cacheName,
            $siteId
        ];
    }
}