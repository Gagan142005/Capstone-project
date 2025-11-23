<?php
require_once __DIR__ . '/../config/database.php';

class Equipment {
    private $db;
    
    // Properties
    private $id;
    private $name;
    private $equipmentType;
    private $processingTimePerSample;
    private $warmupTime;
    private $breakInterval;
    private $breakDuration;
    private $dailyCapacity;
    private $isAvailable;
    private $lastMaintenance;
    private $createdAt;
    private $updatedAt;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Equipment Management Methods
    public function addEquipment($name, $equipmentType, $processingTime, $warmupTime, $breakInterval, $breakDuration, $dailyCapacity) {
        // Method signature for adding new equipment
    }

    public function getEquipmentById($equipmentId) {
        $stmt = $this->db->prepare("SELECT * FROM equipment WHERE id = ?");
        $stmt->execute([$equipmentId]);
        return $stmt->fetch();
    }

    public function updateEquipment($equipmentId, $data) {
        // Method signature for updating equipment details
    }

    public function deleteEquipment($equipmentId) {
        // Method signature for deleting equipment
    }

    public function getAllEquipment($availableOnly = false) {
        if ($availableOnly) {
            $stmt = $this->db->prepare("SELECT * FROM equipment WHERE is_available = 1");
        } else {
            $stmt = $this->db->prepare("SELECT * FROM equipment");
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Equipment Availability Methods
    public function setAvailability($equipmentId, $isAvailable) {
        // Method signature for setting equipment availability
    }

    public function checkAvailability($equipmentId, $startTime, $endTime) {
        // Method signature for checking if equipment is available during time period
    }

    public function getAvailableEquipment($equipmentType = null) {
        // Method signature for retrieving available equipment, optionally by type
    }

    // Equipment Scheduling Methods
    public function scheduleEquipment($equipmentId, $sampleId, $startTime, $duration) {
        // Method signature for scheduling equipment for a sample
    }

    public function calculateProcessingTime($equipmentId, $sampleCount) {
        // Method signature for calculating total processing time including breaks
    }

    public function getEquipmentSchedule($equipmentId, $date = null) {
        // Method signature for retrieving equipment schedule for a date
    }

    public function getNextAvailableSlot($equipmentId) {
        // Method signature for finding next available time slot
    }

    // Equipment Capacity Methods
    public function calculateDailyCapacity($equipmentId) {
        // Method signature for calculating daily capacity based on specs
    }

    public function getRemainingCapacity($equipmentId, $date = null) {
        // Method signature for calculating remaining capacity for a date
    }

    public function isAtCapacity($equipmentId, $date = null) {
        // Method signature for checking if equipment is at capacity
    }

    // Equipment Maintenance Methods
    public function logMaintenance($equipmentId, $maintenanceType, $details) {
        // Method signature for logging maintenance activity
    }

    public function getMaintenanceHistory($equipmentId) {
        // Method signature for retrieving maintenance history
    }

    public function scheduleMaintenanceEquipmentId($scheduledDate) {
        // Method signature for scheduling maintenance
    }

    // Equipment Delay Methods
    public function logDelay($equipmentId, $delayStart, $delayDuration, $reason, $loggedBy) {
        $stmt = $this->db->prepare(
            "INSERT INTO equipment_delays (equipment_id, delay_start, delay_duration, reason, logged_by) 
             VALUES (?, ?, ?, ?, ?)"
        );
        return $stmt->execute([$equipmentId, $delayStart, $delayDuration, $reason, $loggedBy]);
    }

    public function getDelayHistory($equipmentId) {
        // Method signature for retrieving delay history
    }

    public function calculateDelayImpact($equipmentId, $delayDuration) {
        // Method signature for calculating impact of delay on schedule
    }

    // Equipment Statistics Methods
    public function getUtilizationRate($equipmentId, $startDate, $endDate) {
        // Method signature for calculating equipment utilization rate
    }

    public function getEquipmentStatistics($equipmentId) {
        // Method signature for retrieving equipment statistics
    }

    public function getAverageProcessingTime($equipmentId) {
        // Method signature for calculating average processing time
    }

    // Getters and Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEquipmentType() {
        return $this->equipmentType;
    }

    public function setEquipmentType($equipmentType) {
        $this->equipmentType = $equipmentType;
    }

    public function getProcessingTimePerSample() {
        return $this->processingTimePerSample;
    }

    public function setProcessingTimePerSample($processingTimePerSample) {
        $this->processingTimePerSample = $processingTimePerSample;
    }

    public function getWarmupTime() {
        return $this->warmupTime;
    }

    public function setWarmupTime($warmupTime) {
        $this->warmupTime = $warmupTime;
    }

    public function getBreakInterval() {
        return $this->breakInterval;
    }

    public function setBreakInterval($breakInterval) {
        $this->breakInterval = $breakInterval;
    }

    public function getBreakDuration() {
        return $this->breakDuration;
    }

    public function setBreakDuration($breakDuration) {
        $this->breakDuration = $breakDuration;
    }

    public function getDailyCapacity() {
        return $this->dailyCapacity;
    }

    public function setDailyCapacity($dailyCapacity) {
        $this->dailyCapacity = $dailyCapacity;
    }

    public function getIsAvailable() {
        return $this->isAvailable;
    }

    public function setIsAvailable($isAvailable) {
        $this->isAvailable = $isAvailable;
    }

    public function getLastMaintenance() {
        return $this->lastMaintenance;
    }

    public function setLastMaintenance($lastMaintenance) {
        $this->lastMaintenance = $lastMaintenance;
    }
}
