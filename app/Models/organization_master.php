<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class organization_master extends Model
{

    protected $table = 'organization_master';
    protected $primaryKey = 'id';
    protected $guarded = [];

    /************************* Spatie Activity Log variables ****************************/
    
    /**
     * Mention column names that you want to track.
     *
     */
    protected static $logAttributes = [
        'location_name','manufacturer_import_license_no', 'address','gs1_code','common_gs1code','Comments','Status'
    ];

    /**
     * Specify the name of the log.
     *
     */
    protected static $logName = 'Master_Location';

    /**
     * Specify the events which needs to be tracked.
     *
     */
    protected static $recordEvents = ['created','updated'];

    /**
     * You can change the description text in this function
     *
     */
    public function getDescriptionForEvent(string $eventName): string
    {
        // dd($this);  "$this" has entire data of the row which is affected in the table
        return ucfirst($eventName); // ucfirst() is used to make the first letter uppercase
    }

    /**
     * Specify the name of the column that you want to ignore tracking.
     *
     */
    protected static $ignoreChangedAttributes = [];

    /**
     * This is to mention to show only the changed column.
     *
     */
    protected static $logOnlyDirty = true;

    public function users() {
        return $this->HasMany(User::class);
    }

/**********************************************************************/
}
