<?php
// ============================================
// PHP ENUM COMPLETE GUIDE (PHP 8.1+)
// ============================================

// 1. BASIC ENUM (Pure Cases)
// ============================================
enum Status {
    case Pending;
    case Approved;
    case Rejected;
}

$status = Status::Pending;
echo "Basic enum: " . $status->name . "\n"; // Output: Pending


// 2. BACKED ENUM (String Backed)
// ============================================
enum StatusString: string {
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
}

$status = StatusString::Approved;
echo "String backed value: " . $status->value . "\n"; // Output: approved
echo "String backed name: " . $status->name . "\n"; // Output: Approved


// 3. BACKED ENUM (Integer Backed)
// ============================================
enum Priority: int {
    case Low = 1;
    case Medium = 2;
    case High = 3;
    case Critical = 4;
}

$priority = Priority::High;
echo "Int backed value: " . $priority->value . "\n"; // Output: 3


// 4. ENUM WITH METHODS
// ============================================
enum Color: string {
    case Red = '#FF0000';
    case Green = '#00FF00';
    case Blue = '#0000FF';
    
    public function getLabel(): string {
        return match($this) {
            Color::Red => 'Red Color',
            Color::Green => 'Green Color',
            Color::Blue => 'Blue Color',
        };
    }
    
    public function isDark(): bool {
        return $this === Color::Blue;
    }
}

$color = Color::Red;
echo "Color label: " . $color->getLabel() . "\n";
echo "Is dark? " . ($color->isDark() ? 'Yes' : 'No') . "\n";


// 5. ENUM WITH STATIC METHODS
// ============================================
enum HttpStatus: int {
    case OK = 200;
    case NotFound = 404;
    case ServerError = 500;
    
    public static function isSuccess(int $code): bool {
        return $code >= 200 && $code < 300;
    }
    
    public static function fromValue(int $value): ?self {
        return match($value) {
            200 => self::OK,
            404 => self::NotFound,
            500 => self::ServerError,
            default => null,
        };
    }
}

echo "Is 200 success? " . (HttpStatus::isSuccess(200) ? 'Yes' : 'No') . "\n";
$httpStatus = HttpStatus::fromValue(404);
echo "HTTP Status: " . $httpStatus?->name . "\n";


// 6. GET ALL ENUM CASES
// ============================================
enum Role {
    case Admin;
    case Editor;
    case Viewer;
}

$allRoles = Role::cases();
echo "All roles: ";
foreach ($allRoles as $role) {
    echo $role->name . " ";
}
echo "\n";


// 7. FROM() AND TRYFROM() METHODS (Backed Enums Only)
// ============================================
enum Country: string {
    case USA = 'us';
    case UK = 'uk';
    case Canada = 'ca';
}

// from() - throws error if value doesn't exist
try {
    $country = Country::from('us');
    echo "Country from 'us': " . $country->name . "\n";
    
    // This will throw ValueError
    // $invalid = Country::from('xyz');
} catch (ValueError $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// tryFrom() - returns null if value doesn't exist
$country = Country::tryFrom('uk');
echo "Country tryFrom 'uk': " . ($country?->name ?? 'Not found') . "\n";

$invalid = Country::tryFrom('xyz');
echo "Invalid country: " . ($invalid?->name ?? 'Not found') . "\n";


// 8. ENUM IN SWITCH/MATCH STATEMENTS
// ============================================
enum PaymentStatus: string {
    case Pending = 'pending';
    case Paid = 'paid';
    case Failed = 'failed';
    case Refunded = 'refunded';
}

$status = PaymentStatus::Paid;

// Using match
$message = match($status) {
    PaymentStatus::Pending => 'Payment is pending',
    PaymentStatus::Paid => 'Payment completed',
    PaymentStatus::Failed => 'Payment failed',
    PaymentStatus::Refunded => 'Payment refunded',
};
echo "Match result: $message\n";

// Using switch
switch ($status) {
    case PaymentStatus::Pending:
        echo "Please wait...\n";
        break;
    case PaymentStatus::Paid:
        echo "Thank you for payment!\n";
        break;
    default:
        echo "Other status\n";
}


// 9. ENUM WITH TRAITS
// ============================================
trait EnumHelper {
    public function description(): string {
        return "This is " . $this->name;
    }
}

enum Season: string {
    use EnumHelper;
    
    case Spring = 'spring';
    case Summer = 'summer';
    case Fall = 'fall';
    case Winter = 'winter';
}

$season = Season::Summer;
echo "Season description: " . $season->description() . "\n";


// 10. ENUM WITH CONSTANTS
// ============================================
enum FileSize: int {
    case KB = 1024;
    case MB = 1048576;
    case GB = 1073741824;
    
    public const MAX_UPLOAD = self::MB;
    
    public function toBytes(): int {
        return $this->value;
    }
}

echo "Max upload size: " . FileSize::MAX_UPLOAD . "\n";
echo "1 GB in bytes: " . FileSize::GB->toBytes() . "\n";


// 11. ENUM IN TYPE HINTS
// ============================================
function processStatus(Status $status): string {
    return "Processing: " . $status->name;
}

echo processStatus(Status::Approved) . "\n";


// 12. ENUM IN CLASS PROPERTIES
// ============================================
class Order {
    public function __construct(
        public readonly PaymentStatus $status,
        public readonly Priority $priority
    ) {}
    
    public function getInfo(): string {
        return "Order status: {$this->status->value}, Priority: {$this->priority->value}";
    }
}

$order = new Order(PaymentStatus::Paid, Priority::High);
echo $order->getInfo() . "\n";


// 13. ENUM COMPARISON
// ============================================
$status1 = Status::Pending;
$status2 = Status::Pending;
$status3 = Status::Approved;

echo "status1 === status2: " . ($status1 === $status2 ? 'true' : 'false') . "\n";
echo "status1 === status3: " . ($status1 === $status3 ? 'true' : 'false') . "\n";


// 14. SERIALIZATION
// ============================================
$color = Color::Red;
$serialized = serialize($color);
echo "Serialized: $serialized\n";

$unserialized = unserialize($serialized);
echo "Unserialized: " . $unserialized->name . "\n";


// 15. JSON ENCODING (Backed Enums)
// ============================================
$data = [
    'status' => StatusString::Approved,
    'priority' => Priority::High,
];

// Enums need to be converted to their values for JSON
$jsonData = json_encode([
    'status' => $data['status']->value,
    'priority' => $data['priority']->value,
]);
echo "JSON: $jsonData\n";


// 16. ENUM WITH INTERFACES
// ============================================
interface Colorable {
    public function getHexCode(): string;
}

enum ColorCode: string implements Colorable {
    case Red = 'red';
    case Green = 'green';
    case Blue = 'blue';
    
    public function getHexCode(): string {
        return match($this) {
            self::Red => '#FF0000',
            self::Green => '#00FF00',
            self::Blue => '#0000FF',
        };
    }
}

$color = ColorCode::Red;
echo "Hex code: " . $color->getHexCode() . "\n";


// 17. ENUM WITH CONSTRUCTOR-LIKE BEHAVIOR
// ============================================
enum Planet: string {
    case Mercury = 'mercury';
    case Venus = 'venus';
    case Earth = 'earth';
    case Mars = 'mars';
    
    public function getDistance(): int {
        return match($this) {
            self::Mercury => 58,
            self::Venus => 108,
            self::Earth => 150,
            self::Mars => 228,
        };
    }
    
    public function getName(): string {
        return ucfirst($this->value);
    }
}

$planet = Planet::Earth;
echo "Planet: {$planet->getName()}, Distance: {$planet->getDistance()} million km\n";


// 18. CHECKING ENUM TYPE
// ============================================
$value = Status::Pending;
echo "Is enum? " . (is_object($value) && $value instanceof Status ? 'Yes' : 'No') . "\n";
echo "Instance of UnitEnum? " . ($value instanceof \UnitEnum ? 'Yes' : 'No') . "\n";
echo "Instance of BackedEnum? " . ($value instanceof \BackedEnum ? 'Yes' : 'No') . "\n";


// 19. ARRAY MAPPING WITH ENUMS
// ============================================
$statusMap = [
    StatusString::Pending->value => 'Waiting',
    StatusString::Approved->value => 'Done',
    StatusString::Rejected->value => 'Failed',
];

$currentStatus = StatusString::Approved;
echo "Status mapping: " . $statusMap[$currentStatus->value] . "\n";


// 20. ADVANCED: ENUM AS ARRAY KEYS
// ============================================
enum Permission {
    case Read;
    case Write;
    case Delete;
}

$permissions = [
    Permission::Read->name => true,
    Permission::Write->name => true,
    Permission::Delete->name => false,
];

echo "Has delete permission? " . ($permissions[Permission::Delete->name] ? 'Yes' : 'No') . "\n";


echo "\n=== PHP Enum Guide Complete ===\n";
?>