<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->customRepositoryClassName = 'AppBundle\Repository\WarehouseMasterRepository';
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
   'fieldName' => 'id',
   'type' => 'integer',
   'id' => true,
   'columnName' => 'id',
  ));
$metadata->mapField(array(
   'columnName' => 'warehouse_source_id',
   'fieldName' => 'warehouseSourceId',
   'type' => 'integer',
  ));
$metadata->mapField(array(
   'columnName' => 'warehouse_dest_id',
   'fieldName' => 'warehouseDestId',
   'type' => 'integer',
  ));
$metadata->mapField(array(
   'columnName' => 'pallet_id',
   'fieldName' => 'palletId',
   'type' => 'integer',
  ));
$metadata->mapField(array(
   'columnName' => 'transport_id',
   'fieldName' => 'transportId',
   'type' => 'integer',
  ));
$metadata->mapField(array(
   'columnName' => 'initial_date',
   'fieldName' => 'initialDate',
   'type' => 'datetime',
   'nullable' => false,
  ));
$metadata->mapField(array(
   'columnName' => 'end_date',
   'fieldName' => 'endDate',
   'type' => 'datetime',
   'nullable' => true,
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);