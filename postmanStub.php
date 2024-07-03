<?php
$postManCollection = '{
	"info": {
		"_postman_id": "e74e4551-c94f-442d-a1a1-dbe8ba8dd4df",
		"name": "'.$database_name.'",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
		"_exporter_id": "21481838"
	},
	"item": [
		';
        $totalCollections = count($data);
        $totalCollectionsComma = ',';
        foreach ($data as $key => $value) {
            if($key == $totalCollections -1){
                $totalCollectionsComma = '';
            }
            $tableName = $value['table_name'];
            $columns = $value['columns'];
            $bodyData = '';
            $totalItems = count($columns);
            $addComma = ',';
            foreach ($columns as $inerkey => $column) {
                if($inerkey == $totalItems -1){
                    $addComma = '';
                }
            $bodyData .='{
                "key": "'.$column['Field'].'",
                "value": "'.$column['Field'].' enter value here",
                "description": " Field : '.$column['Field'].' Type : '.$column['Type']. ' Null : '.$column['Null']. ' Default : '.$column['Default'].' Comment : '.$column['Comment'].'",
                "type": "text"
            }'.$addComma;
            }
            $postManCollection .=	'{"name": "'.$tableName.'",
			"item": [
				{
					"name": "List",
					"request": {
						"method": "GET",
						"header": [],
						"url": {
							"raw": "{{base-url}}/'.$tableName.'",
							"host": [
								"{{base-url}}"
							],
							"path": [
								"'.$tableName.'"
							]
						}
					},
					"response": []
				},
				{
					"name": "Get",
					"request": {
						"method": "GET",
						"header": [],
						"url": {
							"raw": "{{base-url}}/'.$tableName.'/:id",
							"host": [
								"{{base-url}}"
							],
							"path": [
								"'.$tableName.'",
								":id"
							],
							"variable": [
								{
									"key": "id",
									"value": "1"
								}
							]
						}
					},
					"response": []
				},
				{
					"name": "Create",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								'.$bodyData.'
							]
						},
						"url": {
							"raw": "{{base-url}}/'.$tableName.'",
							"host": [
								"{{base-url}}"
							],
							"path": [
								"'.$tableName.'"
							]
						}
					},
					"response": []
				},
				{
					"name": "Update",
					"request": {
						"method": "PUT",
						"header": [],
						"body": {
							"mode": "urlencoded",
							"urlencoded": [
                                '.$bodyData.'
							]
						},
						"url": {
							"raw": "{{base-url}}/'.$tableName.'/:id",
							"host": [
								"{{base-url}}"
							],
							"path": [
								"'.$tableName.'",
								":id"
							],
							"variable": [
								{
									"key": "id",
									"value": "1"
								}
							]
						}
					},
					"response": []
				},
				{
					"name": "Delete",
					"request": {
						"method": "DELETE",
						"header": [],
						"url": {
							"raw": "{{base-url}}'.$tableName.'/:id",
							"host": [
								"{{base-url}}'.$tableName.'"
							],
							"path": [
								":id"
							],
							"variable": [
								{
									"key": "id",
									"value": "1"
								}
							]
						}
					},
					"response": []
				}
			]
		}'.$totalCollectionsComma;
        }
	$postManCollection .=']
}';

$filename = $database_name . '.json';

file_put_contents($filename, $postManCollection);
include('./downloadFileCode.php');
echo "okay";