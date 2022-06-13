<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory;
    use SoftDeletes;

    const STATUS_WAIT = 'WAIT';
    const STATUS_IN_STOCK = 'IN_STOCK';
    const STATUS_ON_WAY = 'ON_WAY';
    const STATUS_DELIVERED = 'DELIVERED';
    const STATUS_REVEIVED = 'RECEIVED';
    const STATUS_RETURNED = 'RETURNED';

    public static array $statuses = [
        self::STATUS_WAIT => 'Ожидание',
        self::STATUS_IN_STOCK => 'На складе',
        self::STATUS_ON_WAY => 'В пути',
        self::STATUS_DELIVERED => 'Доставлено',
        self::STATUS_REVEIVED => 'Получено',
        self::STATUS_RETURNED => 'Возвращено',
    ];

    protected $fillable = [
        'owner',
        'weight',
        'status',
    ];

    public function updateStatus(string $status): bool
    {
        if (!key_exists($status, self::$statuses)) {
            return false;
        }

        $this->update(['status' => $status]);

        $this->save();

        return true;
    }

    public function delivery(): HasOne
    {
        return $this->hasOne(Delivery::class);
    }
}
