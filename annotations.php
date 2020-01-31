<?php

/**
 * @OA\Info(title="OpenML API", version="1.0.0")
 * REST API for sharing, organizing and reusing machine learning datasets, code, and experiments. Follows a predictive URL scheme from endpoint https://www.openml.org/api/v1/json (or /xml). You need to add your `api_key` to every call (see your account settings), or simply log in. See https://www.openml.org/api_data_docs for the file server API.
 */
/**
 *@OA\Post(
 *	path="/run/trace/{id}",
 *	tags={"run"},
 *	summary="Upload run trace",
 *	description="Uploads a run trace. Upon success, it returns the run id.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="ID of the run.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="description",
 *		in="formData",
 *		type="file",
 *		description="An XML file describing the trace. Also see the [XSD schema](https://www.openml.org/api/v1/xsd/openml.run.trace) and an [XML example](https://www.openml.org/api/v1/xml_example/run.trace).",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="Id of the run with the trace",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="upload_flow",
 *				ref="#/components/schemas/inline_response_200_23_upload_flow",
 *			),
 *			example={
 *			  "run_trace": {
 *			    "id": "2520"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n561 - Problem with uploaded trace file.\n562 - Problem validating xml trace file.\n563 - Problem loading xml trace file.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/run/trace/{id}",
 *	tags={"run"},
 *	summary="Get run trace",
 *	description="Returns the optimization trace of run. The trace contains every setup tried, its evaluation, and whether it was selected.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="ID of the run.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A run trace description",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/RunTrace",
 *			example={
 *			  "trace": {
 *			    "run_id":"573055",
 *			    "trace_iteration": {
 *			        "repeat":"0",
 *			        "fold":"0",
 *			        "repeat":"0",
 *			        "iteration":"0",
 *			        "setup_string":{"parameter_minNumObj": "1",
 *			                        "parameter_confidenceFactor": "0.1"},
 *			        "evaluation":"94.814815",
 *			        "selected": "true"
 *			      },
 *			    "trace_iteration": {
 *			        "repeat":"0",
 *			        "fold":"0",
 *			        "repeat":"0",
 *			        "iteration":"1",
 *			        "setup_string":{"parameter_minNumObj": "1",
 *			                        "parameter_confidenceFactor": "0.25"},
 *			        "evaluation": "94.074074",
 *			        "selected": "true"
 *			      }
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n570 - No successful trace associated with this run\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/study/{id}/attach",
 *	tags={"study"},
 *	summary="Attach a new entity to a study",
 *	description="Attach a new entity to an exising study. Upon success, it returns the study id, type, and linked entities.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="Id of the study. Supplied in the URL path.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="ids",
 *		in="formData",
 *		type="string",
 *		description="Comma-separated list of entity IDs to be attached to the study. For instance, if this is a run study, the list of run IDs that need to be added (attached) to the study. Must be supplied as a POST variable.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="Properties of the updated study",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="study_attach",
 *				ref="#/components/schemas/inline_response_200_26_study_attach",
 *			),
 *			example={
 *			  "study_attach": {
 *			    "id": "1",
 *			    "main_entity_type": "task",
 *			    "linked_entities": "5"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n1041 - Could not find study. Check the study ID in your request.\n1042 - Cannnot attach entities to legacy studies.\n1043 - Please provide POST field 'ids'.\n1044 - Please ensure that the 'ids' in the POST field is a list of natural numbers.\n1045 - Could not attach entities to the study. It appears as if the entity does not exist.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/user/list",
 *	tags={"user"},
 *	summary="List all users by user id",
 *	description="Returns an array with all user ids and names.",
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A list of users",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/UserList",
 *			example={
 *			  "users":{
 *			    "user":[
 *			      {
 *			        "id":"1",
 *			        "username":"janvanrijn@gmail.com"},
 *			      {
 *			        "id":"2",
 *			        "username":"joaquin.vanschoren@gmail.com"}
 *			      ]
 *			  }
 *			}
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/data",
 *	tags={"data"},
 *	summary="Upload dataset",
 *	description="Uploads a dataset. Upon success, it returns the data id.",
 *	@OA\Parameter(
 *		name="description",
 *		in="formData",
 *		type="file",
 *		description="An XML file describing the dataset. Only name, description, and data format are required. Also see the [XSD schema](https://www.openml.org/api/v1/xsd/openml.data.upload) and an [XML example](https://www.openml.org/api/v1/xml_example/data).",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="dataset",
 *		in="formData",
 *		type="file",
 *		description="The actual dataset, being an ARFF file.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="Id of the uploaded dataset",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="upload_data_set",
 *				ref="#/components/schemas/inline_response_200_1_upload_data_set",
 *			),
 *			example={
 *			  "upload_data_set": {
 *			    "id": "4328"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n130 - Problem with file uploading. There was a problem with the file upload.\n131 - Problem validating uploaded description file. The XML description format does not meet the standards.\n132 - Failed to move the files. Internal server error, please contact API administrators.\n133 - Failed to make checksum of datafile. Internal server error, please contact API administrators.\n134 - Failed to insert record in database. Internal server error, please contact API administrators.\n135 - Please provide description xml.\n136 - File failed format verification. The uploaded file is not valid according to the selected file format. Please check the file format specification and try again.\n137 - Please provide API key. In order to share content, please log in or provide your API key.\n138 - Authentication failed. The API key was not valid. Please try to login again, or contact API administrators\n139 - Combination name / version already exists. Leave version out for auto increment\n140 - Both dataset file and dataset url provided. The system is confused since both a dataset file (post) and a dataset url (xml) are provided. Please remove one.\n141 - Neither dataset file or dataset url are provided. Please provide either a dataset file as POST variable, or a dataset url in the description XML.\n142 - Error in processing arff file. Can be a syntax error, or the specified target feature does not exists. For now, we only check on arff files. If a dataset is claimed to be in such a format, and it can not be parsed, this error is returned.\n143 - Suggested target feature not legal. It is possible to suggest a default target feature (for predictive tasks). However, it should be provided in the data.\n144 - Unable to update dataset. The dataset with id could not be found in the database. If you upload a new dataset, unset the id.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/study/{id}/detach",
 *	tags={"study"},
 *	summary="Detach an entity from a study",
 *	description="Detach an entity from an exising study. Upon success, it returns the study id, type, and linked entities.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="Id of the study.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="ids",
 *		in="formData",
 *		type="string",
 *		description="Comma-separated list of entity IDs to be detached from the study. For instance, if this is a run study, the list of run IDs that need to be removed (detached) from the study. Must be supplied as a POST variable.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="Properties of the updated study",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="upload_study",
 *				ref="#/components/schemas/inline_response_200_26_study_attach",
 *			),
 *			example={
 *			  "study_detach": {
 *			    "id": "1",
 *			    "main_entity_type": "task",
 *			    "linked_entities": "5"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n1041 - Could not find study. Check the study ID in your request.\n1042 - Cannot attach entities to legacy studies.\n1043 - Please provide POST field 'ids'.\n1044 - Please ensure that the 'ids' in the POST field is a list of natural numbers.\n1046 - Could not detach entities from the study. It appears as if the entity does not exist.       \n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Delete(
 *	path="/run/{id}",
 *	tags={"run"},
 *	summary="Delete run",
 *	description="Deletes a run. Upon success, it returns the ID of the deleted run.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="Id of the run.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="ID of the deleted run",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="data_delete",
 *				ref="#/components/schemas/inline_response_200_17_data_delete",
 *			),
 *			example={
 *			  "run_delete": {
 *			    "id": "2520"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n390 - Please provide API key. In order to remove your content, please authenticate.\n391 - Authentication failed. The API key was not valid. Please try to login again, or contact api administrators\n392 - Run does not exists. The run ID could not be linked to an existing run.\n393 - Run is not owned by you. The run was owned by another user. Hence you cannot delete it.\n394 - Deleting run failed. Deleting the run failed. Please contact support team.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/run/{id}",
 *	tags={"run"},
 *	summary="Get run description",
 *	description="Returns information about a run. The information includes the name, information about the creator, dependencies, parameters, run instructions and more.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="ID of the run.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A run description",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Run",
 *			example={
 *			  "run": {
 *			    "run_id":"100",
 *			    "uploader":"1",
 *			    "uploader_name":"Jan van Rijn",
 *			    "task_id":"28",
 *			    "task_type":"Supervised Classification",
 *			    "task_evaluation_measure":"predictive_accuracy",
 *			    "flow_id":"67",
 *			    "flow_name":"weka.BayesNet_K2(1)",
 *			    "setup_string":"weka.classifiers.bayes.BayesNet -- -D -Q weka.classifiers.bayes.net.search.local.K2 -- -P 1 -S BAYES -E weka.classifiers.bayes.net.estimate.SimpleEstimator -- -A 0.5",
 *			    "parameter_setting": [
 *			      {
 *			        "name":"D",
 *			        "value":"true"
 *			      },
 *			      {
 *			        "name":"Q",
 *			        "value":"weka.classifiers.bayes.net.search.local.K2"
 *			      },
 *			      {
 *			        "name":"P",
 *			        "value":"1"
 *			      },
 *			      {
 *			        "name":"S",
 *			        "value":"BAYES"
 *			      }
 *			    ],
 *			    "input_data":
 *			      {
 *			        "dataset":
 *			          {
 *			            "did":"28",
 *			            "name":"optdigits",
 *			            "url":"https:\\/\\/www.openml.org\\/data\\/download\\/28\\/dataset_28_optdigits.arff"
 *			          }
 *			      },
 *			    "output_data":
 *			      {
 *			        "file": [
 *			          {
 *			            "did":"48838",
 *			            "file_id":"261",
 *			            "name":"description",
 *			            "url":"https:\\/\\/www.openml.org\\/data\\/download\\/261\\/weka_generated_run935374685998857626.xml"
 *			          },
 *			          {
 *			            "did":"48839",
 *			            "file_id":"262",
 *			            "name":"predictions",
 *			            "url":"https:\\/\\/www.openml.org\\/data\\/download\\/262\\/weka_generated_predictions576954524972002741.arff"
 *			          }
 *			        ],
 *			        "evaluation": [
 *			          {
 *			            "name":"area_under_roc_curve",
 *			            "flow_id":"4",
 *			            "value":"0.990288",
 *			            "array_data":"[0.99724,0.989212,0.992776,0.994279,0.980578,0.98649,0.99422,0.99727,0.994858,0.976143]"
 *			          },
 *			          {
 *			            "name":"confusion_matrix",
 *			            "flow_id":"10",
 *			            "array_data":"[[544,1,0,0,7,0,1,0,0,1],[0,511,21,1,0,1,3,1,5,28],[0,7,511,1,0,1,0,3,23,11],[0,2,2,519,0,3,0,12,16,18],[0,3,0,0,528,0,4,21,6,6],[0,1,0,7,5,488,2,0,4,51],[1,7,0,0,2,0,548,0,0,0],[0,2,0,1,9,1,0,545,4,4],[1,25,2,2,3,6,2,1,503,9],[0,7,0,20,16,5,0,19,9,486]]"
 *			          },
 *			          {
 *			            "name":"f_measure",
 *			            "flow_id":"12",
 *			            "value":"0.922723",
 *			            "array_data":"[0.989091,0.898857,0.935041,0.92431,0.927944,0.918156,0.980322,0.933219,0.895018,0.826531]"
 *			          },
 *			          {
 *			            "name":"kappa",
 *			            "flow_id":"13",
 *			            "value":"0.913601"
 *			          }
 *			        ]
 *			      }
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n220 - Please provide run ID. In order to view run details, please provide the run ID.\n221 - Run not found. The run ID was invalid, run does not exist (anymore).\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/data/qualities/{id}",
 *	tags={"data"},
 *	summary="Get data qualities",
 *	description="Returns the qualities of a dataset.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="Id of the dataset.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="All the qualities of the dataset",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/DataQualities",
 *			example={
 *			  "data_qualities": {
 *			    "quality": [
 *			      {
 *			        "name": "ClassCount",
 *			        "value": "3.0"
 *			      },
 *			      {
 *			        "name": "ClassEntropy",
 *			        "value": "1.584962500721156"
 *			      },
 *			      {
 *			        "name": "NumberOfClasses",
 *			        "value": "3"
 *			      },
 *			      {
 *			        "name": "NumberOfFeatures",
 *			        "value": "5"
 *			      },
 *			      {
 *			        "name": "NumberOfInstances",
 *			        "value": "150"
 *			      },
 *			      {
 *			        "name": "NumberOfInstancesWithMissingValues",
 *			        "value": "0"
 *			      },
 *			      {
 *			        "name": "NumberOfMissingValues",
 *			        "value": "0"
 *			      },
 *			      {
 *			        "name": "NumberOfNumericFeatures",
 *			        "value": "4"
 *			      },
 *			      {
 *			        "name": "NumberOfSymbolicFeatures",
 *			        "value": "0"
 *			      }
 *			    ]
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n360 - Please provide data set ID\n361 - Unknown dataset. The data set with the given ID was not found in the database, or is not shared with you.\n362 - No qualities found. The registered dataset did not contain any calculated qualities.\n363 - Dataset not processed yet. The dataset was not processed yet, no qualities are available. Please wait for a few minutes.\n364 - Dataset processed with error. The quality calculator has run into an error while processing the dataset. Please check whether it is a valid supported file. If so, contact the support team.\n365 - Interval start or end illegal. There was a problem with the interval\nstart or end.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/task/tag",
 *	tags={"task"},
 *	summary="Tag a task",
 *	description="Tags a task.",
 *	@OA\Parameter(
 *		name="task_id",
 *		in="formData",
 *		type="number",
 *		format="integer",
 *		description="Id of the task.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="tag",
 *		in="formData",
 *		type="string",
 *		description="Tag name",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="formData",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="The id of the tagged task",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="task_tag",
 *				ref="#/components/schemas/inline_response_200_6_task_tag",
 *			),
 *			example={
 *			  "task_tag": {
 *			    "id": "2"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n470 - In order to add a tag, please upload the entity id (either data_id, task_id, flow_id, run_id) and tag (the name of the tag).\n471 - Entity not found. The provided entity_id {data_id, task_id, flow_id, run_id} does not correspond to an existing entity.\n472 - Entity already tagged by this tag. The entity {dataset, task, flow, run} already had this tag.\n473 - Something went wrong inserting the tag. Please contact OpenML Team.\n474 - Internal error tagging the entity. Please contact OpenML Team.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/data/features",
 *	tags={"data"},
 *	summary="Upload dataset feature description",
 *	description="Uploads dataset feature description. Upon success, it returns the data id.",
 *	@OA\Parameter(
 *		name="description",
 *		in="formData",
 *		type="file",
 *		description="An XML file describing the dataset. Only name, description, and data format are required. Also see the [XSD schema](https://www.openml.org/api/v1/xsd/openml.data.features) and an [XML example](https://www.openml.org/api/v1/xml_example/data.features).",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n431 - Dataset already processed\n432 - Please provide description xml\n433 - Problem validating uploaded description file\n434 - Could not find dataset\n436 - Something wrong with XML, check data id and evaluation engine id\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/estimationprocedure/list",
 *	tags={"estimationprocedure"},
 *	summary="List all estimation procedures",
 *	description="Returns an array with all model performance estimation procedures in the system.",
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A list of estimation procedures",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/EstimationProcedureList",
 *			example={
 *			  "estimationprocedures": {
 *			    "estimationprocedure": [
 *			      {
 *			         "id":"1",
 *			         "ttid":"1",
 *			         "name":"10-fold Crossvalidation",
 *			         "type":"crossvalidation",
 *			         "repeats":"1",
 *			         "folds":"10",
 *			         "stratified_sampling":"true"
 *			      },
 *			      {
 *			        "id":"2",
 *			        "ttid":"1",
 *			        "name":"5 times 2-fold Crossvalidation",
 *			        "type":"crossvalidation",
 *			        "repeats":"5",
 *			        "folds":"2",
 *			        "stratified_sampling":"true"
 *			      }
 *			    ]
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n500 - No model performance estimation procedures available.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/flow/exists/{name}/{version}",
 *	tags={"flow"},
 *	summary="Check whether flow exists",
 *	description="Checks whether a flow with the given name and (external) version exists.",
 *	@OA\Parameter(
 *		name="name",
 *		in="path",
 *		type="string",
 *		description="The name of the flow.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="version",
 *		in="path",
 *		type="string",
 *		description="The external version of the flow",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A list of flows",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="flow_exists",
 *				ref="#/components/schemas/inline_response_200_10_flow_exists",
 *			),
 *			example={
 *			  "flow_exists": {
 *			    "exists": "true",
 *			    "id": "65"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n330 - Mandatory fields not present. Please provide name and external_version.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/flow/untag",
 *	tags={"flow"},
 *	summary="Untag a flow",
 *	description="Untags a flow.",
 *	@OA\Parameter(
 *		name="flow_id",
 *		in="formData",
 *		type="number",
 *		description="Id of the flow.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="tag",
 *		in="formData",
 *		type="string",
 *		description="Tag name",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="formData",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="The id of the untagged flow",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="flow_untag",
 *				ref="#/components/schemas/inline_response_200_13_flow_untag",
 *			),
 *			example={
 *			  "flow_untag": {
 *			    "id": "2"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n475 - Please give entity_id {data_id, flow_id, run_id} and tag. In order to remove a tag, please upload the entity id (either data_id, flow_id, run_id) and tag (the name of the tag).\n476 - Entity {dataset, flow, run} not found. The provided entity_id {data_id, flow_id, run_id} does not correspond to an existing entity.\n477 - Tag not found. The provided tag is not associated with the entity {dataset, flow, run}.\n478 - Tag is not owned by you. The entity {dataset, flow, run} was tagged\nby another user. Hence you cannot delete it.\n479 - Internal error removing the tag. Please contact OpenML Team.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/run/list/{filters}",
 *	tags={"run"},
 *	summary="List and filter runs",
 *	description="List runs, filtered by a range of properties. Any number of properties can be combined by listing them one after the other in the form '/run/list/{filter}/{value}/{filter}/{value}/...' Returns an array with all runs that match the constraints. A maximum of 10,000 results are returned, an error is returned if the result set is bigger. Use pagination (via limit and offset filters), or limit the results to certain tasks, flows, setups, or uploaders.",
 *	@OA\Parameter(
 *		name="filters",
 *		in="path",
 *		type="string",
 *		description="Any combination of these filters
/tag/{tag} - return only runs tagged with the given tag.
/run/{ids} - return only specific runs, specified as a comma-separated list of run IDs, e.g. ''1,2,3''
/task/{ids} - return only runs on specific tasks, specified as a comma-separated list of task IDs, e.g. ''1,2,3''
/flow/{ids} - return only runs on specific flows, specified as a comma-separated list of flow IDs, e.g. ''1,2,3''
/setup/{ids} - return only runs with specific setups, specified as a comma-separated list of setup IDs, e.g. ''1,2,3''
/uploader/{ids} - return only runs uploaded by specific users, specified as a comma-separated list of user IDs, e.g. ''1,2,3''
/limit/{limit}/offset/{offset} - returns only {limit} results starting from result number {offset}. Useful for paginating results. With /limit/5/offset/10, results 11..15 will be returned. Both limit and offset need to be specified.
",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A list of runs descriptions",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/RunList",
 *			example={"runs": {"run": [{"upload_time": "2014-04-06 23:30:40", "task_id": "28", "run_id": "100", "error_message": [], "setup_id": "12", "uploader": "1", "flow_id": "67"}, {"upload_time": "2014-04-06 23:30:40", "task_id": "48", "run_id": "101", "error_message": [], "setup_id": "6", "uploader": "1", "flow_id": "61"}, {"upload_time": "2014-04-06 23:30:40", "task_id": "41", "run_id": "102", "error_message": [], "setup_id": "3", "uploader": "1", "flow_id": "58"}]}}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n510 - Please provide at least task, flow or setup, uploader or run, to filter results, or limit the number of responses. The number of runs is huge. Please limit the result space.\n511 - Input not safe. The input parameters (task_id, setup_id, flow_id, run_id, uploader_id) did not meet the constraints (comma separated list of integers).\n512 - There where no results. Check whether there are runs under the given constraint.\n513 - Too many results. Given the constraints, there were still too many results. Please add filters to narrow down the list.\n514 - Illegal filter specified.\n515 - Offset specified without limit.\n516 - Requested result limit too high.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Delete(
 *	path="/task/{id}",
 *	tags={"task"},
 *	summary="Delete task",
 *	description="Deletes a task. Upon success, it returns the ID of the deleted task.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="Id of the task.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="ID of the deleted task",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="task_delete",
 *				ref="#/components/schemas/inline_response_200_4_task_delete",
 *			),
 *			example={
 *			  "task_delete": {
 *			    "id": "4328"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n450 - Please provide API key. In order to remove your content, please authenticate.\n451 - Authentication failed. The API key was not valid. Please try to login again, or contact api administrators.\n452 - Task does not exists. The task ID could not be linked to an existing task.\n454 - Task is executed in some runs. Delete these first.\n455 - Deleting the task failed. Please contact support team.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/task/{id}",
 *	tags={"task"},
 *	summary="Get task description",
 *	description="Returns information about a task. The information includes the task type, input data, train/test sets, and more.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="ID of the task.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A task description",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Task",
 *			example={
 *			  "task": {
 *			    "task_id":"1",
 *			    "task_type":"Supervised Classification",
 *			    "input":[
 *			      {
 *			        "name":"source_data",
 *			        "data_set":{
 *			          "data_set_id":"1",
 *			          "target_feature":"class"
 *			        }
 *			      },
 *			      {
 *			        "name":"estimation_procedure",
 *			        "estimation_procedure":{
 *			          "type":"crossvalidation",
 *			          "data_splits_url":"https://www.openml.org/api_splits/get/1/Task_1_splits.arff",
 *			          "parameter":[
 *			            {
 *			              "name":"number_repeats",
 *			              "value":"1"
 *			            },
 *			            {
 *			              "name":"number_folds",
 *			              "value":"10"
 *			            },
 *			            {
 *			              "name":"percentage"
 *			            },
 *			            {
 *			              "name":"stratified_sampling",
 *			              "value":"true"
 *			            }
 *			          ]
 *			        }
 *			      },
 *			      {
 *			        "name":"cost_matrix",
 *			        "cost_matrix":[]
 *			      },
 *			      {
 *			        "name":"evaluation_measures",
 *			        "evaluation_measures":
 *			          {
 *			            "evaluation_measure":"predictive_accuracy"
 *			          }
 *			      }
 *			    ],
 *			    "output":{
 *			      "name":"predictions",
 *			      "predictions":{
 *			        "format":"ARFF",
 *			        "feature":[
 *			          {
 *			            "name":"repeat",
 *			            "type":"integer"
 *			          },
 *			          {
 *			            "name":"fold",
 *			            "type":"integer"
 *			          },
 *			          {
 *			            "name":"row_id",
 *			            "type":"integer"
 *			          },
 *			          {
 *			            "name":"confidence.classname",
 *			            "type":"numeric"
 *			          },
 *			          {
 *			            "name":"prediction",
 *			            "type":"string"
 *			          }
 *			        ]
 *			      }
 *			    },
 *			    "tag":["basic","study_1","under100k","under1m"]
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n150 - Please provide task_id.\n151 - Unknown task. The task with the given id was not found in the database\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/evaluationmeasure/list",
 *	tags={"evaluationmeasure"},
 *	summary="List all evaluation measures",
 *	description="Returns an array with all model evaluation measures in the system.",
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A list of evaluation measures",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/EvaluationMeasureList",
 *			example={
 *			  "evaluation_measures":{
 *			    "measures":{
 *			      "measure":[
 *			        "area_under_roc_curve",
 *			        "average_cost",
 *			        "binominal_test",
 *			        "build_cpu_time"
 *			        ]
 *			    }
 *			  }
 *			}
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/run",
 *	tags={"run"},
 *	summary="Upload run",
 *	description="Uploads a run. Upon success, it returns the run id.",
 *	@OA\Parameter(
 *		name="description",
 *		in="formData",
 *		type="file",
 *		description="An XML file describing the dataset. Only name, description, and data format are required. Also see the [XSD schema](https://www.openml.org/api/v1/xsd/openml.run.upload) and an [XML example](https://www.openml.org/api/v1/xml_example/run).",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="predictions",
 *		in="formData",
 *		type="file",
 *		description="The predictions generated by the run",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="model_readable",
 *		in="formData",
 *		type="file",
 *		description="The human-readable model generated by the run",
 *		required="false",
 *	),
 *	@OA\Parameter(
 *		name="model_serialized",
 *		in="formData",
 *		type="file",
 *		description="The serialized model generated by the run",
 *		required="false",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="Id of the uploaded run",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="upload_flow",
 *				ref="#/components/schemas/inline_response_200_18_upload_flow",
 *			),
 *			example={
 *			  "upload_run": {
 *			    "id": "2520"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n201 - Authentication failed. The API key was not valid. Please try to login again, or contact api administrators.\n202 - Please provide run XML.\n203 - Could not validate run xml by XSD. Please double check that the xml is valid.\n204 - Unknown task. The task with the given ID was not found in the database.\n205 - Unknown flow. The flow with the given ID was not found in the database.\n206 - Invalid number of files. The number of uploaded files did not match the number of files expected for the task type\n207 - File upload failed. One of the files uploaded has a problem.\n208 - Error inserting setup record. Please contact api administrators\n210 - Unable to store run. Please contact api administrators.\n211 - Dataset not in database. One of the datasets of the task was not included in database, please contact api administrators.\n212 - Unable to store file. Please contact api administrators.\n213 - Parameter in run xml unknown. One of the parameters provided in the run xml is not registered as parameter for the flow nor its components.\n214 - Unable to store input setting. Please contact API support team.\n215 - Unable to evaluate predictions. Please contact API support team.\n216 - Error thrown by Java Application. Additional information field is provided.\n217 - Error processing output data. Unknown or inconsistent evaluation measure. One of the provided evaluation measures could not be matched with a record in the math_function or flow table.\n218 - Wrong flow associated with run. The flow implements a math_function, which is unable to generate predictions. Please select another flow.\n219 - Error reading the XML document. The XML description file could not be verified.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/run/reset/{id}",
 *	tags={"run"},
 *	summary="Resets a run.",
 *	description="Removes all run evaluations. When a run is reset, the runs will automatically be evaluated as soon as they are picked up by the evaluation engine again.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="string",
 *		description="Run ID.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="Id of the evaluated run",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="run_reset",
 *				ref="#/components/schemas/inline_response_200_21_upload_flow",
 *			),
 *			example={
 *			  "run_reset": {
 *			    "id": "2520"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n412 - Run does not exist\n413 - Run is not owned by you\n394 - Resetting run failed\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/setup/untag",
 *	tags={"setup"},
 *	summary="Untag a setup",
 *	description="Untags a setup.",
 *	@OA\Parameter(
 *		name="setup_id",
 *		in="formData",
 *		type="number",
 *		description="Id of the setup.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="tag",
 *		in="formData",
 *		type="string",
 *		description="Tag name",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="formData",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="The id of the untagged setup",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="flow_untag",
 *				ref="#/components/schemas/inline_response_200_16_flow_untag",
 *			),
 *			example={
 *			  "setup_untag": {
 *			    "id": "2"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n475 - Please give entity_id {data_id, flow_id, run_id} and tag. In order to remove a tag, please upload the entity id (either data_id, flow_id, run_id) and tag (the name of the tag).\n476 - Entity {dataset, flow, run} not found. The provided entity_id {data_id, flow_id, run_id} does not correspond to an existing entity.\n477 - Tag not found. The provided tag is not associated with the entity {dataset, flow, run}.\n478 - Tag is not owned by you. The entity {dataset, flow, run} was tagged\nby another user. Hence you cannot delete it.\n479 - Internal error removing the tag. Please contact OpenML Team.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/flow",
 *	tags={"flow"},
 *	summary="Upload a flow",
 *	description="Uploads a flow. Upon success, it returns the flow id.",
 *	@OA\Parameter(
 *		name="description",
 *		in="formData",
 *		type="file",
 *		description="An XML file describing the flow. Only name and description are required. Also see the [XSD schema](https://www.openml.org/api/v1/xsd/openml.implementation.upload) and an [XML example](https://www.openml.org/api/v1/xml_example/flow).",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="flow",
 *		in="formData",
 *		type="file",
 *		description="The actual flow, being a source (or binary) file.",
 *		required="false",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="Id of the uploaded flow",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="upload_flow",
 *				ref="#/components/schemas/inline_response_200_9_upload_flow",
 *			),
 *			example={
 *			  "upload_flow": {
 *			    "id": "2520"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n160 - Error in file uploading. There was a problem with the file upload.\n161 - Please provide description xml.\n163 - Problem validating uploaded description file. The XML description format does not meet the standards.\n164 - Flow already stored in database. Please change name or version number\n165 - Failed to insert flow. There can be many causes for this error. If you included the implements field, it should be an existing entry in the algorithm or math_function table. Otherwise it could be an internal server error. Please contact API support team.\n166 - Failed to add flow to database. Internal server error, please contact API administrators\n167 - Illegal files uploaded. An non required file was uploaded.\n168 - The provided md5 hash equals not the server generated md5 hash of the file.\n169 - Please provide API key. In order to share content, please authenticate and provide API key.\n170 - Authentication failed. The API key was not valid. Please try to login again, or contact API administrators\n171 - Flow already exists. This flow is already in the database\n172 - XSD not found. Please contact API support team\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/setup/tag",
 *	tags={"setup"},
 *	summary="Tag a setup",
 *	description="Tags a setup.",
 *	@OA\Parameter(
 *		name="setup_id",
 *		in="formData",
 *		type="number",
 *		format="integer",
 *		description="Id of the setup.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="tag",
 *		in="formData",
 *		type="string",
 *		description="Tag name",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="formData",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="The id of the tagged setup",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="flow_tag",
 *				ref="#/components/schemas/inline_response_200_15_flow_tag",
 *			),
 *			example={
 *			  "setup_tag": {
 *			    "id": "2"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n470 - In order to add a tag, please upload the entity id (either data_id, flow_id, run_id) and tag (the name of the tag).\n471 - Entity not found. The provided entity_id {data_id, flow_id, run_id} does not correspond to an existing entity.\n472 - Entity already tagged by this tag. The entity {dataset, flow, run} already had this tag.\n473 - Something went wrong inserting the tag. Please contact OpenML Team.\n474 - Internal error tagging the entity. Please contact OpenML Team.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/flow/tag",
 *	tags={"flow"},
 *	summary="Tag a flow",
 *	description="Tags a flow.",
 *	@OA\Parameter(
 *		name="flow_id",
 *		in="formData",
 *		type="number",
 *		format="integer",
 *		description="Id of the flow.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="tag",
 *		in="formData",
 *		type="string",
 *		description="Tag name",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="formData",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="The id of the tagged flow",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="flow_tag",
 *				ref="#/components/schemas/inline_response_200_12_flow_tag",
 *			),
 *			example={
 *			  "flow_tag": {
 *			    "id": "2"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n470 - In order to add a tag, please upload the entity id (either data_id, flow_id, run_id) and tag (the name of the tag).\n471 - Entity not found. The provided entity_id {data_id, flow_id, run_id} does not correspond to an existing entity.\n472 - Entity already tagged by this tag. The entity {dataset, flow, run} already had this tag.\n473 - Something went wrong inserting the tag. Please contact OpenML Team.\n474 - Internal error tagging the entity. Please contact OpenML Team.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/flow/list/{filters}",
 *	tags={"flow"},
 *	summary="List and filter flows",
 *	description="List flows, possibly filtered by a range of properties. Any number of properties can be combined by listing them one after the other in the form '/task/list/{filter}/{value}/{filter}/{value}/...' Returns an array with all flows that match the constraints.",
 *	@OA\Parameter(
 *		name="filters",
 *		in="path",
 *		type="string",
 *		description="Any combination of these filters
/limit/{limit}/offset/{offset} - returns only {limit} results starting from result number {offset}. Useful for paginating results. With /limit/5/offset/10, tasks 11..15 will be returned. Both limit and offset need to be specified.
/tag/{tag} - returns only tasks tagged with the given tag.
/uploader/{id} - return only evaluations uploaded by a specific user, specified by user ID.
",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A list of flows",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/FlowList",
 *			example={
 *			  "flows":
 *			    {
 *			      "flow":[
 *			        {
 *			          "id":"65",
 *			          "full_name":"weka.RandomForest(1)",
 *			          "name":"weka.RandomForest",
 *			          "version":"1",
 *			          "external_version":"Weka_3.7.10_9186",
 *			          "uploader":"1"
 *			        },
 *			        {
 *			          "id":"66",
 *			          "full_name":"weka.IBk(1)",
 *			          "name":"weka.IBk",
 *			          "version":"1",
 *			          "external_version":"Weka_3.7.10_8034",
 *			          "uploader":"1"
 *			        },
 *			        {
 *			          "id":"67",
 *			          "full_name":"weka.BayesNet_K2(1)",
 *			          "name":"weka.BayesNet_K2",
 *			          "version":"1",
 *			          "external_version":"Weka_3.7.10_8034",
 *			          "uploader":"1"
 *			        }
 *			      ]
 *			    }
 *			  }
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n500 - No results. There where no matches for the given constraints.\n501 - Illegal filter specified.\n502 - Filter values/ranges not properly specified.\n503 - Can not specify an offset without a limit.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/data/tag",
 *	tags={"data"},
 *	summary="Tag a dataset",
 *	description="Tags a dataset.",
 *	@OA\Parameter(
 *		name="data_id",
 *		in="formData",
 *		type="number",
 *		format="integer",
 *		description="Id of the dataset.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="tag",
 *		in="formData",
 *		type="string",
 *		description="Tag name",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="formData",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="The id of the tagged dataset",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="data_tag",
 *				ref="#/components/schemas/inline_response_200_2_data_tag",
 *			),
 *			example={
 *			  "data_tag": {
 *			    "id": "2"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n470 - In order to add a tag, please upload the entity id (either data_id, flow_id, run_id) and tag (the name of the tag).\n471 - Entity not found. The provided entity_id {data_id, flow_id, run_id} does not correspond to an existing entity.\n472 - Entity already tagged by this tag. The entity {dataset, flow, run} already had this tag.\n473 - Something went wrong inserting the tag. Please contact OpenML Team.\n474 - Internal error tagging the entity. Please contact OpenML Team.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/study/list/{filters}",
 *	tags={"study"},
 *	summary="List all studies (collections of items)",
 *	description="List studies, optionally filtered by a range of properties. Any number of properties can be combined by listing them one after the other in the form '/study/list/{filter}/{value}/{filter}/{value}/...' Returns an array with all studies that match the constraints.",
 *	@OA\Parameter(
 *		name="filters",
 *		in="path",
 *		type="string",
 *		description="Any combination of these filters
/main_entity_type/{type} - only return studies collecting entities of a given type (e.g. 'task' or 'run').
/uploader/{ids} - return only evaluations uploaded by specific users, specified as a comma-separated list of user IDs, e.g. ''1,2,3''
/limit/{limit}/offset/{offset} - returns only {limit} results starting from result number {offset}. Useful for paginating results. With /limit/5/offset/10, results 11..15 will be returned. Both limit and offset need to be specified.
",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A list of studies",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/StudyList",
 *			example={
 *			  "study_list":{
 *			    "study":[
 *			      {
 *			        "id":"1",
 *			        "alias":"Study_1",
 *			        "name":"A large-scale comparison of classification algorithms",
 *			        "creation_date":"2017-07-20 15:51:20",
 *			        "creator":"2"
 *			      },
 *			      {
 *			        "id":"2",
 *			        "alias":"Study_2",
 *			        "name":"Fast Algorithm Selection using Learning Curves",
 *			        "creation_date":"2017-07-20 15:51:20",
 *			        "creator":"2"
 *			      }
 *			    ]
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Delete(
 *	path="/data/{id}",
 *	tags={"data"},
 *	summary="Delete dataset",
 *	description="Deletes a dataset. Upon success, it returns the ID of the deleted dataset.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="Id of the dataset.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="ID of the deleted dataset",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="data_delete",
 *				ref="#/components/schemas/inline_response_200_data_delete",
 *			),
 *			example={
 *			  "data_delete": {
 *			    "id": "4328"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned\n- 350 - Please provide API key. In order to remove your content, please authenticate.\n- 351 - Authentication failed. The API key was not valid. Please try to login again, or contact api administrators.\n- 352 - Dataset does not exists. The data ID could not be linked to an existing dataset.\n- 353 - Dataset is not owned by you. The dataset is owned by another user. Hence you cannot delete it.\n- 354 - Dataset is in use by other content. Can not be deleted. The data is used in tasks or runs. Delete other content before deleting this dataset.\n- 355 - Deleting dataset failed. Deleting the dataset failed. Please contact support team.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/data/{id}",
 *	tags={"data"},
 *	summary="Get dataset description",
 *	description="Returns information about a dataset. The information includes the name, information about the creator, URL to download it and more.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="Id of the dataset.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A dataset description",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Data",
 *			example={
 *			  "data_set_description": {
 *			    "id": "1",
 *			    "name": "anneal",
 *			    "version": "2",
 *			    "description": "...",
 *			    "format": "ARFF",
 *			    "upload_date": "2014-04-06 23:19:20",
 *			    "licence": "Public",
 *			    "url": "https://www.openml.org/data/download/1/dataset_1_anneal.arff",
 *			    "file_id": "1",
 *			    "default_target_attribute": "class",
 *			    "version_label": "2",
 *			    "tag": [
 *			      "study_1",
 *			      "uci"
 *			    ],
 *			    "visibility": "public",
 *			    "original_data_url": "https://www.openml.org/d/2",
 *			    "status": "active",
 *			    "md5_checksum": "d01f6ccd68c88b749b20bbe897de3713"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned\n110 - Please provide data_id.\n111 - Unknown dataset. Data set description with data_id was not found in the database.\n112 - No access granted. This dataset is not shared with you.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/data/status/update/",
 *	tags={"data"},
 *	summary="Change the status of a dataset",
 *	description="Change the status of a dataset, either 'active' or 'deactivated'",
 *	@OA\Parameter(
 *		name="data_id",
 *		in="formData",
 *		type="number",
 *		format="integer",
 *		description="Id of the dataset.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="status",
 *		in="formData",
 *		type="string",
 *		description="The status on which to filter the results, either 'active' or 'deactivated'.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="formData",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n691 - Illegal status\n692 - Dataset does not exists\n693 - Dataset is not owned by you\n694 - Illegal status transition\n695 - Status update failed\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/data/qualities/list",
 *	tags={"data"},
 *	summary="List all data qualities",
 *	description="Returns a list of all data qualities in the system.",
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A list of data qualities",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/DataQualityList",
 *			example={
 *			  "data_qualities_list":{
 *			    "quality":[
 *			      "NumberOfClasses",
 *			      "NumberOfFeatures",
 *			      "NumberOfInstances",
 *			      "NumberOfInstancesWithMissingValues",
 *			      "NumberOfMissingValues",
 *			      "NumberOfNumericFeatures",
 *			      "NumberOfSymbolicFeatures"
 *			    ]
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned\n370 - No data qualities available. There are no data qualities in the system.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/run/untag",
 *	tags={"run"},
 *	summary="Untag a run",
 *	description="Untags a run.",
 *	@OA\Parameter(
 *		name="run_id",
 *		in="formData",
 *		type="number",
 *		description="Id of the run.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="tag",
 *		in="formData",
 *		type="string",
 *		description="Tag name",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="formData",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="The id of the untagged run",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="run_untag",
 *				ref="#/components/schemas/inline_response_200_20_run_untag",
 *			),
 *			example={
 *			  "run_untag": {
 *			    "id": "2"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n475 - Please give entity_id {data_id, flow_id, run_id} and tag. In order to remove a tag, please upload the entity id (either data_id, flow_id, run_id) and tag (the name of the tag).\n476 - Entity {dataset, flow, run} not found. The provided entity_id {data_id, flow_id, run_id} does not correspond to an existing entity.\n477 - Tag not found. The provided tag is not associated with the entity {dataset, flow, run}.\n478 - Tag is not owned by you. The entity {dataset, flow, run} was tagged by another user. Hence you cannot delete it.\n479 - Internal error removing the tag. Please contact OpenML Team.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/study",
 *	tags={"study"},
 *	summary="Create new study",
 *	description="Creates a new study. Upon success, it returns the study id.",
 *	@OA\Parameter(
 *		name="description",
 *		in="formData",
 *		type="file",
 *		description="An XML file describing the study. Also see the [XSD schema](https://www.openml.org/api/v1/xsd/openml.study.upload) and an [XML example](https://www.openml.org/api/v1/xml_example/study).",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="Id of the uploaded study",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="upload_study",
 *				ref="#/components/schemas/inline_response_200_25_upload_study",
 *			),
 *			example={
 *			  "upload_study": {
 *			    "id": "4328"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n1031 - Description file not present. Please upload the study description.\n1032 - Problem validating uploaded description file. The XML description format does not meet the standards. See the XSD schema.\n1033 - Illegal main entity type. Currently only collections of tasks and can be created.\n1034 - Linked entities are not of the correct type fot this study.\n1035 - Benchmark suites can only be linked to run studies.\n1036 - Referred benchmark suite cannot be found.\n1037 - Referred benchmark suite should be a task collection.\n1038 - Study alias is not unique.\n1039 - Dataset insertion problem. Please contact the administrators.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/task/untag",
 *	tags={"task"},
 *	summary="Untag a task",
 *	description="Untags a task.",
 *	@OA\Parameter(
 *		name="task_id",
 *		in="formData",
 *		type="number",
 *		description="Id of the task.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="tag",
 *		in="formData",
 *		type="string",
 *		description="Tag name",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="formData",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A the features of the task",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="task_untag",
 *				ref="#/components/schemas/inline_response_200_7_task_untag",
 *			),
 *			example={
 *			  "task_untag": {
 *			    "id": "2"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n475 - Please give entity_id {data_id, flow_id, run_id} and tag. In order to remove a tag, please upload the entity id (either data_id, task_id, flow_id, run_id) and tag (the name of the tag).\n476 - Entity {dataset, task, flow, run} not found. The provided entity_id {data_id, task_id, flow_id, run_id} does not correspond to an existing entity.\n477 - Tag not found. The provided tag is not associated with the entity {dataset, task, flow, run}.\n478 - Tag is not owned by you. The entity {dataset, flow, run} was tagged by another user. Hence you cannot delete it.\n479 - Internal error removing the tag. Please contact OpenML Team.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/tasktype/{id}",
 *	tags={"tasktype"},
 *	summary="Get task type description",
 *	description="Returns information about a task type. The information includes a description, the given inputs and the expected outputs.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="ID of the task.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A task type description",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/TaskType",
 *			example={
 *			  "task_type": {
 *			    "id": "1",
 *			    "name": "Supervised Classification",
 *			    "description": "In supervised classification, you are given an input dataset in which instances are labeled with a certain class. The goal is to build a model that predicts the class for future unlabeled instances. The model is evaluated using a train-test procedure, e.g. cross-validation.<br><br>\
 *			\
 *			To make results by different users comparable, you are given the exact train-test folds to be used, and you need to return at least the predictions generated by your model for each of the test instances. OpenML will use these predictions to calculate a range of evaluation measures on the server.<br><br>\
 *			\
 *			You can also upload your own evaluation measures, provided that the code for doing so is available from the implementation used. For extremely large datasets, it may be infeasible to upload all predictions. In those cases, you need to compute and provide the evaluations yourself.<br><br>\
 *			\
 *			Optionally, you can upload the model trained on all the input data. There is no restriction on the file format, but please use a well-known format or PMML.",
 *			    "creator": [
 *			      "Joaquin Vanschoren",
 *			      "Jan van Rijn",
 *			      "Luis Torgo",
 *			      "Bernd Bischl"
 *			    ],
 *			    "contributor": [
 *			      "Bo Gao",
 *			      "Simon Fischer",
 *			      "Venkatesh Umaashankar",
 *			      "Michael Berthold",
 *			      "Bernd Wiswedel",
 *			      "Patrick Winter"
 *			    ],
 *			    "creation_date": "2013-01-24 00:00:00",
 *			    "input": [
 *			      {
 *			        "name": "source_data",
 *			        "requirement": "required",
 *			        "data_type": "numeric"
 *			      },
 *			      {
 *			        "name": "target_feature",
 *			        "requirement": "required",
 *			        "data_type": "string"
 *			      },
 *			      {
 *			        "name": "estimation_procedure",
 *			        "requirement": "required",
 *			        "data_type": "numeric"
 *			      },
 *			      {
 *			        "name": "cost_matrix",
 *			        "data_type": "json"
 *			      },
 *			      {
 *			        "name": "custom_testset",
 *			        "data_type": "json"
 *			      },
 *			      {
 *			        "name": "evaluation_measures",
 *			        "data_type": "string"
 *			      }
 *			    ]
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n240 - Please provide task type ID.\n241 - Unknown task type. The task type with the given id was not found in the database\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/setup/list/{filters}",
 *	tags={"setup"},
 *	summary="List and filter setups",
 *	description="List setups, filtered by a range of properties. Any number of properties can be combined by listing them one after the other in the form '/setup/list/{filter}/{value}/{filter}/{value}/...' Returns an array with all evaluations that match the constraints. A maximum of 1,000 results are returned at a time, an error is returned if the result set is bigger. Use pagination (via limit and offset filters), or limit the results to certain flows, setups, or tags.",
 *	@OA\Parameter(
 *		name="filters",
 *		in="path",
 *		type="string",
 *		description="Any combination of these filters
/tag/{tag} - returns only setups tagged with the given tag.
/flow/{ids} - return only setups for specific flows, specified as a comma-separated list of flow IDs, e.g. ''1,2,3''
/setup/{ids} - return only specific setups, specified as a comma-separated list of setup IDs, e.g. ''1,2,3''
/limit/{limit}/offset/{offset} - returns only {limit} results starting from result number {offset}. Useful for paginating results. With /limit/5/offset/10, results 11..15 will be returned. Both limit and offset need to be specified.
",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A list of setup descriptions",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/SetupList",
 *			example={
 *			  "setups": {
 *			    "setup": [
 *			      {
 *			        "setup_id":"10",
 *			        "flow_id":"65",
 *			        "parameter": [
 *			          {
 *			            "id":"4144",
 *			            "flow_id":"65",
 *			            "flow_name":"weka.RandomForest",
 *			            "full_name":"weka.RandomForest(1)_I",
 *			            "parameter_name":"I",
 *			            "data_type":"option",
 *			            "default_value":"10",
 *			            "value":"10"
 *			          },
 *			          {
 *			            "id":"4145",
 *			            "flow_id":"65",
 *			            "flow_name":"weka.RandomForest",
 *			            "full_name":"weka.RandomForest(1)_K",
 *			            "parameter_name":"K",
 *			            "data_type":"option",
 *			            "default_value":"0",
 *			            "value":"0"
 *			          }
 *			        ]
 *			      }
 *			    ]
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n670 - Please specify at least one filter.\n671 - Illegal filter.\n672 - Illegal filter input.\n673 - Result set too big. Please use one of the filters or the limit option.\n674 - No results, please check the filter.\n675 - Cannot specify offset without limit.\n676 - Requested result limit too high.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/data/untag",
 *	tags={"data"},
 *	summary="Untag a dataset",
 *	description="Untags a dataset.",
 *	@OA\Parameter(
 *		name="data_id",
 *		in="formData",
 *		type="number",
 *		description="Id of the dataset.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="tag",
 *		in="formData",
 *		type="string",
 *		description="Tag name",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="formData",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="The ID of the untagged dataset",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="data_untag",
 *				ref="#/components/schemas/inline_response_200_3_data_untag",
 *			),
 *			example={
 *			  "data_untag": {
 *			    "id": "2"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n475 - Please give entity_id {data_id, flow_id, run_id} and tag. In order to remove a tag, please upload the entity id (either data_id, flow_id, run_id) and tag (the name of the tag).\n476 - Entity {dataset, flow, run} not found. The provided entity_id {data_id, flow_id, run_id} does not correspond to an existing entity.\n477 - Tag not found. The provided tag is not associated with the entity {dataset, flow, run}.\n478 - Tag is not owned by you. The entity {dataset, flow, run} was tagged by another user. Hence you cannot delete it.\n479 - Internal error removing the tag. Please contact OpenML Team.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Delete(
 *	path="/study/{id}",
 *	tags={"study"},
 *	summary="Delete study",
 *	description="Deletes a study. Upon success, it returns the ID of the deleted study.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="Id of the study.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="ID of the deleted study",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="study_delete",
 *				ref="#/components/schemas/inline_response_200_24_study_delete",
 *			),
 *			example={
 *			  "study_delete": {
 *			    "id": "1"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n591 - Please provide API key. In order to remove your content, please authenticate.\n592 - Study does not exists. The study ID could not be linked to an existing study.\n593 - Study deletion failed. Please try again later.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/study/{id}",
 *	tags={"study"},
 *	summary="Get study description by study id or alias",
 *	description="Returns information about the study with the given id or alias.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="string",
 *		description="ID or alias of the study.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A study description",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Study",
 *			example={
 *			  "study": {
 *			    "id": "99",
 *			    "main_entity_type": "task",
 *			    "name": "CC18 benchmark suite",
 *			    "description": "CC18 benchmark suite",
 *			    "creation_date": "2019-02-16T17:35:58",
 *			    "creator": "1159",
 *			    "data": {"data_id": ["1","2","3"]},
 *			    "tasks": {"task_id": ["1","2","3"]}
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n601 - Unknown study. The study with the given id or alias was not found in the database\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/evaluation/request/{evaluation_engine_id}/{order}",
 *	tags={"evaluation"},
 *	summary="Get an unevaluated run",
 *	description="This call is for people running their own evaluation engines. It returns the details of a run that is not yet evaluated by the given evaluation engine. It doesn't evaluate the run, it just returns the run info.",
 *	@OA\Parameter(
 *		name="evaluation_engine_id",
 *		in="path",
 *		type="string",
 *		description="The ID of the evaluation engine. You get this ID when you register a new evaluation engine with OpenML. The ID of the main evaluation engine is 1.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="order",
 *		in="path",
 *		type="string",
 *		description="When there are multiple runs still to evaluate, this defines which one to return. Options are 'normal' - the oldest run, 'reverse' - the newest run, or 'random' - a random run.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A list of evaluations descriptions",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/EvaluationRequest",
 *			example={"evaluation_request": {"run": [{"setup_id": "68799271", "upload_time": "2018-04-03 21:05:38", "uploader": "1935", "task_id": "3021", "run_id": "8943712"}]}}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n100 - Function not valid.\n545 - No unevaluated runs according to the criteria.\n546 - Illegal filter.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/flow/owned",
 *	tags={"flow"},
 *	summary="List flows owned by you",
 *	description="Returns an array with all flows owned by you.",
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A list of flows",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="flow_owned",
 *				ref="#/components/schemas/inline_response_200_11_flow_owned",
 *			),
 *			example={
 *			  "flow_owned": {
 *			    "id": [
 *			      "111",
 *			      "112",
 *			      "113",
 *			      "114",
 *			      "115",
 *			      "116",
 *			      "117"
 *			    ]
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n310 - Please provide API key to authenticate.\n311 - Authentication failed. The API key was not valid. Please try to login again, or contact api administrators.\n312 - No flows owned by you.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/data/features/{id}",
 *	tags={"data"},
 *	summary="Get data features",
 *	description="Returns the features of a dataset.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="Id of the dataset.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="All the features of the dataset",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/DataFeatures",
 *			example={
 *			  "data_features": {
 *			    "feature": [
 *			      {
 *			        "index": "0",
 *			        "name": "sepallength",
 *			        "data_type": "numeric",
 *			        "is_target": "false",
 *			        "is_ignore": "false",
 *			        "is_row_identifier": "false"
 *			      },
 *			      {
 *			        "index": "1",
 *			        "name": "sepalwidth",
 *			        "data_type": "numeric",
 *			        "is_target": "false",
 *			        "is_ignore": "false",
 *			        "is_row_identifier": "false"
 *			      },
 *			      {
 *			        "index": "2",
 *			        "name": "petallength",
 *			        "data_type": "numeric",
 *			        "is_target": "false",
 *			        "is_ignore": "false",
 *			        "is_row_identifier": "false"
 *			      },
 *			      {
 *			        "index": "3",
 *			        "name": "petalwidth",
 *			        "data_type": "numeric",
 *			        "is_target": "false",
 *			        "is_ignore": "false",
 *			        "is_row_identifier": "false"
 *			      },
 *			      {
 *			        "index": "4",
 *			        "name": "class",
 *			        "data_type": "nominal",
 *			        "is_target": "true",
 *			        "is_ignore": "false",
 *			        "is_row_identifier": "false"
 *			      }
 *			    ]
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n270 - Please provide dataset ID.\n271 - Unknown dataset. Data set with the given data ID was not found (or is not shared with you).\n272 - No features found. The dataset did not contain any features, or we could not extract them.\n273 - Dataset not processed yet. The dataset was not processed yet, features are not yet available. Please wait for a few minutes.\n274 - Dataset processed with error. The feature extractor has run into an error while processing the dataset. Please check whether it is a valid supported file. If so, please contact the API admins.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Delete(
 *	path="/setup/{id}",
 *	tags={"setup"},
 *	summary="Delete setup",
 *	description="Deletes a setup. Upon success, it returns the ID of the deleted setup.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="Id of the setup.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="ID of the deleted setup",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="study_delete",
 *				ref="#/components/schemas/inline_response_200_14_study_delete",
 *			),
 *			example={
 *			  "setup_delete": {
 *			    "id": "1"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n401 - Authentication failed. Please provide API key. In order to remove your content, please authenticate.\n402 - Setup does not exists. The setup ID could not be linked to an existing setup.\n404 - Setup deletion failed. Setup is in use by other content (runs, schedules, etc). Can not be deleted.\n405 - Setup deletion failed. Please try again later.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/setup/{id}",
 *	tags={"setup"},
 *	summary="Get a hyperparameter setup",
 *	description="Returns information about a setup. The information includes the list of hyperparameters, with name, value, and default value.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="ID of the hyperparameter setup (configuration). These IDs are stated in run descriptions.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A setup description",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Setup",
 *			example={
 *			  "setup_parameters":{
 *			    "flow_id":"59",
 *			    "parameter":[
 *			      {
 *			        "full_name":"weka.JRip(1)_F",
 *			        "parameter_name":"F",
 *			        "data_type":"option",
 *			        "default_value":"3",
 *			        "value":"3"
 *			      },{
 *			        "full_name":"weka.JRip(1)_N",
 *			        "parameter_name":"N",
 *			        "data_type":"option",
 *			        "default_value":"2.0",
 *			        "value":"2.0"
 *			      },{
 *			        "full_name":"weka.JRip(1)_O",
 *			        "parameter_name":"O",
 *			        "data_type":"option",
 *			        "default_value":"2",
 *			        "value":"2"
 *			      },{
 *			        "full_name":"weka.JRip(1)_S",
 *			        "parameter_name":"S",
 *			        "data_type":"option",
 *			        "default_value":"1",
 *			        "value":"1"
 *			      }]
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n280 - Please provide setup ID. In order to view setup details, please provide the run ID\n281 - Setup not found. The setup ID was invalid, or setup does not exist (anymore).\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/run/tag",
 *	tags={"run"},
 *	summary="Tag a run",
 *	description="Tags a run.",
 *	@OA\Parameter(
 *		name="run_id",
 *		in="formData",
 *		type="number",
 *		format="integer",
 *		description="Id of the run.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="tag",
 *		in="formData",
 *		type="string",
 *		description="Tag name",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="formData",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="The id of the tagged run",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="run_tag",
 *				ref="#/components/schemas/inline_response_200_19_run_tag",
 *			),
 *			example={
 *			  "run_tag": {
 *			    "id": "2"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n470 - In order to add a tag, please upload the entity id (either data_id, flow_id, run_id) and tag (the name of the tag).\n471 - Entity not found. The provided entity_id {data_id, flow_id, run_id} does not correspond to an existing entity.\n472 - Entity already tagged by this tag. The entity {dataset, flow, run} already had this tag.\n473 - Something went wrong inserting the tag. Please contact OpenML Team.\n474 - Internal error tagging the entity. Please contact OpenML Team.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/task",
 *	tags={"task"},
 *	summary="Upload task",
 *	description="Uploads a task. Upon success, it returns the task id.",
 *	@OA\Parameter(
 *		name="description",
 *		in="formData",
 *		type="file",
 *		description="An XML file describing the task. Only name, description, and task format are required. Also see the [XSD schema](https://www.openml.org/api/v1/xsd/openml.task.upload) and an [XML example](https://www.openml.org/api/v1/xml_example/task).",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="Id of the uploaded task",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="upload_task",
 *				ref="#/components/schemas/inline_response_200_5_upload_task",
 *			),
 *			example={
 *			  "upload_task": {
 *			    "id": "4328"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n530 - Description file not present. Please upload the task description.\n531 - Internal error. Please contact api support team\n532 - Problem validating uploaded description file. The XML description format does not meet the standards\n533 - Task already exists.\n534 - Error creating the task.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/evaluation/list/{filters}",
 *	tags={"evaluation"},
 *	summary="List and filter evaluations",
 *	description="List evaluations, filtered by a range of properties. Any number of properties can be combined by listing them one after the other in the form '/evaluation/list/{filter}/{value}/{filter}/{value}/...' Returns an array with all evaluations that match the constraints. A maximum of 10,000 results are returned, an error is returned if the result set is bigger. Use pagination (via limit and offset filters), or limit the results to certain tasks, flows, setups, uploaders or runs.",
 *	@OA\Parameter(
 *		name="filters",
 *		in="path",
 *		type="string",
 *		description="Any combination of these filters
/function/{name} - name of the evaluation measure, e.g. area_under_auc or predictive_accuracy. See the OpenML website for the complete list of measures.
/tag/{tag} - returns only evaluations of runs tagged with the given tag.
/run/{ids} - return only evaluations for specific runs, specified as a comma-separated list of run IDs, e.g. ''1,2,3''
/task/{ids} - return only evaluations for specific tasks, specified as a comma-separated list of task IDs, e.g. ''1,2,3''
/flow/{ids} - return only evaluations for specific flows, specified as a comma-separated list of flow IDs, e.g. ''1,2,3''
/setup/{ids} - return only evaluations for specific setups, specified as a comma-separated list of setup IDs, e.g. ''1,2,3''
/uploader/{ids} - return only evaluations uploaded by specific users, specified as a comma-separated list of user IDs, e.g. ''1,2,3''
/limit/{limit}/offset/{offset} - returns only {limit} results starting from result number {offset}. Useful for paginating results. With /limit/5/offset/10, results 11..15 will be returned. Both limit and offset need to be specified.
/per_fold/{true,false} - whether or not to return crossvalidation scores per fold. Defaults to 'false'. Setting it to 'true' leads to large numbers of results, use only for very specific sets of runs.
/sort_order/{asc,desc} - sorts the results by the evaluation value, according to the selected evaluation measure (function)
",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A list of evaluations descriptions",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/EvaluationList",
 *			example={"evaluations": {"evaluation": [{"function": "area_under_roc_curve", "upload_time": "2014-04-06 23:30:40", "task_id": "68", "run_id": "1", "array_data": "[0,0.99113,0.898048,0.874862,0.791282,0.807343,0.820674]", "value": "0.839359", "uploader": "1", "flow_id": "61"}, {"function": "f_measure", "upload_time": "2014-04-06 23:30:40", "task_id": "68", "run_id": "1", "array_data": "[0,0,0.711934,0.735714,0.601363,0.435678,0.430913]", "value": "0.600026", "uploader": "1", "flow_id": "61"}, {"function": "predictive_accuracy", "upload_time": "2014-04-06 23:30:40", "task_id": "68", "run_id": "1", "array_data": [], "value": "0.614634", "uploader": "1", "flow_id": "61"}]}}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n540 - Please provide at least task, flow or setup, uploader or run, to\nfilter results, or limit the number of responses.\n541 - The input parameters (task_id, setup_id, flow_id, run_id, uploader_id) did not meet the constraints (comma separated list of integers).\n542 - There where no results. Check whether there are runs under the given constraint.\n543 - Too many results. Given the constraints, there were still too many results. Please add filters to narrow down the list.\n544 - Illegal filter specified.\n545 - Offset specified without limit.\n546 - Requested result limit too high.\n547 - Per fold can only be set to value "true" or "false".\n548 - Per fold queries are experimental and require a fair amount of filters on resulting run records to keep the query fast (use, e.g., flow, setup, task and uploader filter)\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/task/list/{filters}",
 *	tags={"task"},
 *	summary="List and filter tasks",
 *	description="List tasks, possibly filtered by a range of properties from the task itself or from the underlying dataset. Any number of properties can be combined by listing them one after the other in the form '/task/list/{filter}/{value}/{filter}/{value}/...' Returns an array with all tasks that match the constraints.",
 *	@OA\Parameter(
 *		name="filters",
 *		in="path",
 *		type="string",
 *		description="Any combination of these filters
/limit/{limit}/offset/{offset} - returns only {limit} results starting from result number {offset}. Useful for paginating results. With /limit/5/offset/10, tasks 11..15 will be returned. Both limit and offset need to be specified.
/status/{status} - returns only tasks with a given status, either 'active', 'deactivated', or 'in_preparation'.
/type/{type_id} - returns only tasks with a given task type id. See the list of task types of the ID's (e.g. 1 = Supervised Classification).
/tag/{tag} - returns only tasks tagged with the given tag.
/data_tag/{tag} - returns only tasks for which the underlying dataset is tagged with the given tag.
/{data_quality}/{range} - returns only tasks for which the underlying datasets have certain qualities. {data_quality} can be data_id, data_name, number_instances, number_features, number_classes, number_missing_values. {range} can be a specific value or a range in the form 'low..high'. Multiple qualities can be combined, as in 'number_instances/0..50/number_features/0..10'.
",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A list of tasks with the given tag",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/TaskList",
 *			example={
 *			  "task": {
 *			    "task": [
 *			      {
 *			        "task_id":"1",
 *			        "task_type":"Supervised Classification",
 *			        "did":"1",
 *			        "name":"anneal",
 *			        "status":"active",
 *			        "format":"ARFF",
 *			        "input":[
 *			          {
 *			            "name":"estimation_procedure",
 *			            "value":"1"
 *			          },
 *			          {
 *			            "name":"evaluation_measures",
 *			            "value":"predictive_accuracy"
 *			          },
 *			          {
 *			            "name":"source_data",
 *			            "value":"1"
 *			          },
 *			          {
 *			            "name":"target_feature",
 *			            "value":"class"
 *			          }
 *			          ],
 *			        "quality":[
 *			          {
 *			            "name":"MajorityClassSize",
 *			            "value":"684"
 *			          },
 *			          {
 *			            "name":"MaxNominalAttDistinctValues",
 *			            "value":"10.0"
 *			          },
 *			          {
 *			            "name":"MinorityClassSize",
 *			            "value":"0"
 *			          },
 *			          {
 *			            "name":"NumBinaryAtts",
 *			            "value":"14.0"
 *			          },
 *			          {
 *			            "name":"NumberOfClasses",
 *			            "value":"6"
 *			          },
 *			          {
 *			            "name":"NumberOfFeatures",
 *			            "value":"39"
 *			          },
 *			          {
 *			            "name":"NumberOfInstances",
 *			            "value":"898"
 *			          },
 *			          {
 *			            "name":"NumberOfInstancesWithMissingValues",
 *			            "value":"0"
 *			          },
 *			          {
 *			            "name":"NumberOfMissingValues",
 *			            "value":"0"
 *			          },
 *			          {
 *			            "name":"NumberOfNumericFeatures",
 *			            "value":"6"
 *			          },
 *			          {
 *			            "name":"NumberOfSymbolicFeatures",
 *			            "value":"32"
 *			          }
 *			          ],
 *			        "tag":[
 *			          "basic",
 *			          "study_1",
 *			          "study_7",
 *			          "under100k",
 *			          "under1m"
 *			        ]
 *			      }
 *			    ]
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n480 - Illegal filter specified.\n481 - Filter values/ranges not properly specified.\n482 - No results. There where no matches for the given constraints.\n483 - Can not specify an offset without a limit.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/data/qualities/unprocessed/{data_engine_id}/{order}",
 *	tags={"data"},
 *	summary="Get a list of datasets with unprocessed qualities",
 *	description="This call is for people running their own dataset processing engines. It returns the details of datasets for which certain qualities are not yet processed by the given processing engine. It doesn't process the datasets, it just returns the dataset info.",
 *	@OA\Parameter(
 *		name="data_engine_id",
 *		in="path",
 *		type="string",
 *		description="The ID of the data processing engine. You get this ID when you register a new data processing engine with OpenML. The ID of the main data processing engine is 1.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="order",
 *		in="path",
 *		type="string",
 *		description="When there are multiple datasets still to process, this defines which ones to return. Options are 'normal' - the oldest datasets, or 'random'.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Parameter(
 *		name="qualities",
 *		in="formData",
 *		type="string",
 *		description="Comma-separated list of (at least two) quality names, e.g. 'NumberOfInstances,NumberOfFeatures'.",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A list of unprocessed datasets",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/DataUnprocessed",
 *			example={"data_unprocessed": {"run": [{"did": "1", "status": "deactivated", "version": "2", "name": "anneal", "format": "ARFF"}]}}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n686 - Please specify the features the evaluation engine wants to calculate (at least 2).\n687 - No unprocessed datasets according to the given set of meta-features.\n688 - Illegal qualities.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Delete(
 *	path="/flow/{id}",
 *	tags={"flow"},
 *	summary="Delete a flow",
 *	description="Deletes a flow. Upon success, it returns the ID of the deleted flow.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="Id of the flow.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="ID of the deleted flow",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="flow_delete",
 *				ref="#/components/schemas/inline_response_200_8_flow_delete",
 *			),
 *			example={
 *			  "flow_delete": {
 *			    "id": "4328"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n320 - Please provide API key. In order to remove your content, please authenticate.\n321 - Authentication failed. The API key was not valid. Please try to login again, or contact api administrators.\n322 - Flow does not exists. The flow ID could not be linked to an existing flow.\n323 - Flow is not owned by you. The flow is owned by another user. Hence you cannot delete it.\n324 - Flow is in use by other content. Can not be deleted. The flow is used in runs, evaluations or as a component of another flow. Delete other content before deleting this flow.\n325 - Deleting flow failed. Deleting the flow failed. Please contact\nsupport team.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/flow/{id}",
 *	tags={"flow"},
 *	summary="Get flow description",
 *	description="Returns information about a flow. The information includes the name, information about the creator, dependencies, parameters, run instructions and more.",
 *	@OA\Parameter(
 *		name="id",
 *		in="path",
 *		type="number",
 *		format="integer",
 *		description="ID of the flow.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A flow description",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Flow",
 *			example={
 *			  "flow": {
 *			    "id":"100",
 *			    "uploader":"1",
 *			    "name":"weka.J48",
 *			    "version":"2",
 *			    "external_version":"Weka_3.7.5_9117",
 *			    "description":"...",
 *			    "upload_date":"2014-04-23 18:00:36",
 *			    "language":"Java",
 *			    "dependencies":"Weka_3.7.5",
 *			    "parameter": [
 *			      {
 *			        "name":"A",
 *			        "data_type":"flag",
 *			        "default_value":[],
 *			        "description":"Laplace smoothing..."
 *			      },
 *			      {
 *			        "name":"C",
 *			        "data_type":"option",
 *			        "default_value":"0.25",
 *			        "description":"Set confidence threshold..."
 *			      }
 *			    ]
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n180 - Please provide flow id.\n181 - Unknown flow. The flow with the given ID was not found in the database.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/run/evaluate",
 *	tags={"run"},
 *	summary="Uploads a run evaluation",
 *	description="Uploads a run evaluation. When successful, it returns the run id.",
 *	@OA\Parameter(
 *		name="description",
 *		in="formData",
 *		type="file",
 *		description="An XML file describing the run evaluation.Also see the [XSD schema](https://www.openml.org/api/v1/xsd/openml.run.evaluate) and an [XML example](https://www.openml.org/api/v1/xml_example/run.evaluate).",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="Id of the evaluated run",
 *		@OA\JsonContent(
 *			type="object",
 *			@OA\Property(
 *				property="upload_flow",
 *				ref="#/components/schemas/inline_response_200_21_upload_flow",
 *			),
 *			example={
 *			  "run_evaluate": {
 *			    "id": "2520"
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n422 - Upload problem description XML\n423 - Problem validating uploaded description file\n424 - Problem opening description xml\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/data/list/{filters}",
 *	tags={"data"},
 *	summary="List and filter datasets",
 *	description="List datasets, possibly filtered by a range of properties. Any number of properties can be combined by listing them one after the other in the form '/data/list/{filter}/{value}/{filter}/{value}/...' Returns an array with all datasets that match the constraints.",
 *	@OA\Parameter(
 *		name="filters",
 *		in="path",
 *		type="string",
 *		description="Any combination of these filters
/limit/{limit}/offset/{offset} - returns only {limit} results starting from result number {offset}. Useful for paginating results. With /limit/5/offset/10, results 11..15 will be returned. Both limit and offset need to be specified.
/status/{status} - returns only datasets with a given status, either 'active', 'deactivated', or 'in_preparation'.
/tag/{tag} - returns only datasets tagged with the given tag.
/{data_quality}/{range} - returns only tasks for which the underlying datasets have certain qualities. {data_quality} can be data_id, data_name, data_version, number_instances, number_features, number_classes, number_missing_values. {range} can be a specific value or a range in the form 'low..high'. Multiple qualities can be combined, as in 'number_instances/0..50/number_features/0..10'.
",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A list of datasets with the given task",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/DataList",
 *			example={
 *			  "data": {
 *			    "dataset": [
 *			      {
 *			        "did":"1",
 *			        "name":"anneal",
 *			        "status":"active",
 *			        "format":"ARFF",
 *			        "quality":[
 *			          {
 *			            "name":"MajorityClassSize",
 *			            "value":"684"
 *			          },
 *			          {
 *			            "name":"MaxNominalAttDistinctValues",
 *			            "value":"10.0"
 *			          },
 *			          {
 *			            "name":"MinorityClassSize"
 *			            ,"value":"0"
 *			          },
 *			          {
 *			            "name":"NumBinaryAtts",
 *			            "value":"14.0"
 *			          },
 *			          {
 *			            "name":"NumberOfClasses",
 *			            "value":"6"
 *			          },
 *			          {
 *			            "name":"NumberOfFeatures",
 *			            "value":"39"
 *			          },
 *			          {
 *			            "name":"NumberOfInstances",
 *			            "value":"898"
 *			          },
 *			          {
 *			            "name":"NumberOfInstancesWithMissingValues",
 *			            "value":"0"
 *			          },
 *			          {
 *			            "name":"NumberOfMissingValues",
 *			            "value":"0"
 *			          },
 *			          {
 *			            "name":"NumberOfNumericFeatures",
 *			            "value":"6"
 *			          },
 *			          {
 *			            "name":"NumberOfSymbolicFeatures",
 *			            "value":"32"
 *			          }
 *			        ]
 *			      }
 *			    ]
 *			  }
 *			}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n370 - Illegal filter specified.\n371 - Filter values/ranges not properly specified.\n372 - No results. There where no matches for the given constraints.\n373 - Can not specify an offset without a limit.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/data/unprocessed/{data_engine_id}/{order}",
 *	tags={"data"},
 *	summary="Get a list of unprocessed datasets",
 *	description="This call is for people running their own dataset processing engines. It returns the details of datasets that are not yet processed by the given processing engine. It doesn't process the datasets, it just returns the dataset info.",
 *	@OA\Parameter(
 *		name="data_engine_id",
 *		in="path",
 *		type="string",
 *		description="The ID of the data processing engine. You get this ID when you register a new data processing engine with OpenML. The ID of the main data processing engine is 1.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="order",
 *		in="path",
 *		type="string",
 *		description="When there are multiple datasets still to process, this defines which ones to return. Options are 'normal' - the oldest datasets, or 'random'.",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A list of unprocessed datasets",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/DataUnprocessed",
 *			example={"data_unprocessed": {"run": [{"did": "1", "status": "deactivated", "version": "2", "name": "anneal", "format": "ARFF"}]}}
 *		),
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n681 - No unprocessed datasets.\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Get(
 *	path="/tasktype/list",
 *	tags={"tasktype"},
 *	summary="List all task types",
 *	description="Returns an array with all task types in the system.",
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="API key to authenticate the user",
 *		required="false",
 *	),
 *	@OA\Response(
 *		response=default,
 *		description="Unexpected error",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *	@OA\Response(
 *		response=200,
 *		description="A task description",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/TaskTypeList",
 *			example={
 *			  "task_types":{
 *			    "task_type":[
 *			      {
 *			        "id":"1",
 *			        "name":"Supervised Classification",
 *			        "description":"In supervised classification, you are given ...",
 *			        "creator":"Joaquin Vanschoren, Jan van Rijn, Luis Torgo, Bernd Bischl"
 *			      },
 *			      {
 *			        "id":"2",
 *			        "name":"Supervised Regression",
 *			        "description":"Given a dataset with a numeric target ...",
 *			        "creator":"Joaquin Vanschoren, Jan van Rijn, Luis Torgo, Bernd Bischl"
 *			      },{}
 *			    ]
 *			  }
 *			}
 *		),
 *	),
 *)
 */

/**
 *@OA\Post(
 *	path="/data/qualities",
 *	tags={"data"},
 *	summary="Upload dataset qualities",
 *	description="Uploads dataset qualities. Upon success, it returns the data id.",
 *	@OA\Parameter(
 *		name="description",
 *		in="formData",
 *		type="file",
 *		description="An XML file describing the dataset. Only name, description, and data format are required. Also see the [XSD schema](https://www.openml.org/api/v1/xsd/openml.data.qualities) and an [XML example](https://www.openml.org/api/v1/xml_example/data.qualities).",
 *		required="true",
 *	),
 *	@OA\Parameter(
 *		name="api_key",
 *		in="query",
 *		type="string",
 *		description="Api key to authenticate the user",
 *		required="true",
 *	),
 *	@OA\Response(
 *		response=412,
 *		description="Precondition failed. An error code and message are returned.\n381 - Something wrong with XML, please check did and evaluation_engine_id\n382 - Please provide description xml\n383 - Problem validating uploaded description file\n384 - Dataset not processed yet\n",
 *		@OA\JsonContent(
 *			ref="#/components/schemas/Error",
 *		),
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_16_flow_untag",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the untagged setup",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200",
 *	@OA\Property(
 *		property="data_delete",
 *		ref="#/components/schemas/inline_response_200_data_delete",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="EvaluationMeasureList_evaluation_measures_measures",
 *	@OA\Property(
 *		property="measure",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_10_flow_exists",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="The id of the flow with the given name and (external) version",
 *	),
 *	@OA\Property(
 *		property="exists",
 *		type="string",
 *		description="true or false",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Data_data_set_description",
 *	@OA\Property(
 *		property="default_target_attribute",
 *		type="string",
 *		description="For tabular data, the name of the column that is typically used as the target attribute for that data set",
 *	),
 *	@OA\Property(
 *		property="upload_date",
 *		type="string",
 *		description="The datetime that the dataset was uploaded, format yyyy-MM-dd HH:mm:ss",
 *	),
 *	@OA\Property(
 *		property="version_label",
 *		type="string",
 *		description="The version of the dataset, as defined by the uploader, for reference. Can be any format as long as it is unique.",
 *	),
 *	@OA\Property(
 *		property="description",
 *		type="string",
 *		description="Wiki description of the dataset, in (Git flavoured) markdown format",
 *	),
 *	@OA\Property(
 *		property="format",
 *		type="string",
 *		description="Data format, for instance ARFF",
 *	),
 *	@OA\Property(
 *		property="url",
 *		type="string",
 *		description="The URL where the data can be downloaded",
 *	),
 *	@OA\Property(
 *		property="tag",
 *		type="array",
 *		description="Tags added by OpenML users. Includes study tags in the form `study_1`",
 *	),
 *	@OA\Property(
 *		property="visibility",
 *		type="string",
 *		description="Who can see the dataset. For instance `public`.",
 *	),
 *	@OA\Property(
 *		property="md5_checksum",
 *		type="string",
 *		description="Checksum to verify downloads of the dataset",
 *	),
 *	@OA\Property(
 *		property="version",
 *		type="string",
 *		description="The version of the dataset, set by OpenML. A positive integer",
 *	),
 *	@OA\Property(
 *		property="status",
 *		type="string",
 *		description="active, in_preparation, or deactivated",
 *	),
 *	@OA\Property(
 *		property="file_id",
 *		type="string",
 *		description="The ID of the dataset file stored on the OpenML server",
 *	),
 *	@OA\Property(
 *		property="licence",
 *		type="string",
 *		description="The licence granted for using the dataset, for instance Public or CC-BY",
 *	),
 *	@OA\Property(
 *		property="original_data_url",
 *		type="string",
 *		description="The URL where the original data is hosted.",
 *	),
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the dataset, a positive integer",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the dataset",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="DataList_data_dataset",
 *	@OA\Property(
 *		property="did",
 *		type="string",
 *		description="The dataset ID",
 *	),
 *	@OA\Property(
 *		property="status",
 *		type="string",
 *		description="The dataset status, either in_preparation, active, or deactivated",
 *	),
 *	@OA\Property(
 *		property="quality",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The dataset name",
 *	),
 *	@OA\Property(
 *		property="format",
 *		type="string",
 *		description="The data format of the dataset, e.g. ARFF",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Task_task_description_estimation_procedure",
 *	@OA\Property(
 *		property="parameter",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="type",
 *		type="string",
 *		description="The type of procedure, e.g. crossvalidation",
 *	),
 *	@OA\Property(
 *		property="data_splits_url",
 *		type="string",
 *		description="The url where the data splits can be downloaded",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="DataList_data_quality",
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the property",
 *	),
 *	@OA\Property(
 *		property="value",
 *		type="string",
 *		description="The value of the property",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="FlowList_flows_flow",
 *	@OA\Property(
 *		property="full_name",
 *		type="string",
 *		description="The full flow name (name + internal version number)",
 *	),
 *	@OA\Property(
 *		property="external_version",
 *		type="string",
 *		description="The external flow version",
 *	),
 *	@OA\Property(
 *		property="version",
 *		type="string",
 *		description="The internal flow version",
 *	),
 *	@OA\Property(
 *		property="uploader",
 *		type="string",
 *		description="The ID of the person who uploaded the flow",
 *	),
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="The flow ID",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The flow name",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Run_run_description_input_data_dataset",
 *	@OA\Property(
 *		property="did",
 *		type="string",
 *		description="The id of the dataset",
 *	),
 *	@OA\Property(
 *		property="url",
 *		type="string",
 *		description="The download url of the dataset",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the dataset",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="EvaluationList_evaluations",
 *	@OA\Property(
 *		property="evaluation",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_14_study_delete",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the deleted setup, a positive integer",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="DataUnprocessed",
 *	type="object",
 *	@OA\Property(
 *		property="data_unprocessed",
 *		ref="#/components/schemas/DataUnprocessed_data_unprocessed",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="DataUnprocessed_data_unprocessed_dataset",
 *	@OA\Property(
 *		property="did",
 *		type="string",
 *		description="ID of the dataset a positive integer",
 *	),
 *	@OA\Property(
 *		property="status",
 *		type="string",
 *		description="Status of the dataset",
 *	),
 *	@OA\Property(
 *		property="version",
 *		type="string",
 *		description="Version of the dataset, a positive integer",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the dataset",
 *	),
 *	@OA\Property(
 *		property="format",
 *		type="string",
 *		description="The dataset format, e.g. ARFF",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="EstimationProcedureList_estimationprocedures",
 *	@OA\Property(
 *		property="estimationprocedure",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="TaskTypeList",
 *	type="object",
 *	@OA\Property(
 *		property="task_types",
 *		ref="#/components/schemas/TaskTypeList_task_types",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Run_run_description_output_data_evaluation",
 *	@OA\Property(
 *		property="array_data",
 *		type="string",
 *		description="For composite evaluation measures (e.g. per-class measures, confusion matrix), a string (JSON) representation of the   evaluation.",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the evaluation measure",
 *	),
 *	@OA\Property(
 *		property="value",
 *		type="string",
 *		description="The result of the evaluation",
 *	),
 *	@OA\Property(
 *		property="flow_id",
 *		type="string",
 *		description="The id of the code used to compute this evaluation method",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="TaskList_task_quality",
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the quality",
 *	),
 *	@OA\Property(
 *		property="value",
 *		type="string",
 *		description="The value of the quality",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Task_task_description",
 *	@OA\Property(
 *		property="input",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="task_type",
 *		type="string",
 *		description="The type of the task, e.g. Supervised Classification",
 *	),
 *	@OA\Property(
 *		property="tag",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="task_id",
 *		type="string",
 *		description="ID of the task, a positive integer",
 *	),
 *	@OA\Property(
 *		property="output",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_9_upload_flow",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the uploaded flow, a positive integer",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Flow_flow_description",
 *	@OA\Property(
 *		property="upload_date",
 *		type="string",
 *		description="The datetime that the flow was uploaded, format yyyy-MM-dd HH:mm:ss",
 *	),
 *	@OA\Property(
 *		property="description",
 *		type="string",
 *		description="Wiki description of the flow, in (Git flavoured) markdown format",
 *	),
 *	@OA\Property(
 *		property="language",
 *		type="string",
 *		description="The programming language the flow is written in.",
 *	),
 *	@OA\Property(
 *		property="parameter",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="tag",
 *		type="array",
 *		description="Tags added by OpenML users. Includes study tags in the form `study_1`",
 *	),
 *	@OA\Property(
 *		property="version",
 *		type="string",
 *		description="The version of the flow, set by OpenML. A positive integer",
 *	),
 *	@OA\Property(
 *		property="version_label",
 *		type="string",
 *		description="The version of the flow, as defined by the uploader, for reference. Can be any format as long as it is unique.",
 *	),
 *	@OA\Property(
 *		property="dependencies",
 *		type="string",
 *		description="The libraries that this flow depends on, and their version numbers.",
 *	),
 *	@OA\Property(
 *		property="uploader",
 *		type="string",
 *		description="The uploader of the flow",
 *	),
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the flow, a positive integer",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the flow",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Task",
 *	type="object",
 *	@OA\Property(
 *		property="task_description",
 *		ref="#/components/schemas/Task_task_description",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Setup",
 *	type="object",
 *	@OA\Property(
 *		property="setup_parameters",
 *		ref="#/components/schemas/Setup_setup_parameters",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="FlowList_flows",
 *	@OA\Property(
 *		property="flow",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="RunTrace",
 *	type="object",
 *	@OA\Property(
 *		property="trace",
 *		ref="#/components/schemas/RunTrace_trace",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Task_task_description_predictions_feature",
 *	@OA\Property(
 *		property="type",
 *		type="string",
 *		description="The type of the prediction feature, e.g. integer",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the prediction feature, e.g. row_id",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_24_study_delete",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the deleted study, a positive integer",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_5_upload_task",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the uploaded task, a positive integer",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_13_flow_untag",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the untagged flow",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="UserList_users",
 *	@OA\Property(
 *		property="user",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="DataFeatures",
 *	type="object",
 *	@OA\Property(
 *		property="data_features",
 *		ref="#/components/schemas/DataFeatures_data_features",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Task_task_description_predictions",
 *	@OA\Property(
 *		property="feature",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="format",
 *		type="string",
 *		description="The fromat of the predictions, e.g. ARFF",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_15_flow_tag",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the tagged setup",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Setup_setup_parameters",
 *	@OA\Property(
 *		property="parameter_setting",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="flow_id",
 *		type="string",
 *		description="ID of the flow, a positive integer",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="DataList",
 *	type="object",
 *	@OA\Property(
 *		property="data",
 *		ref="#/components/schemas/DataList_data",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_26_study_attach",
 *	@OA\Property(
 *		property="linked_entities",
 *		type="string",
 *		description="The number of linked entities",
 *	),
 *	@OA\Property(
 *		property="main_entity_type",
 *		type="string",
 *		description="Main entity type of the of the study",
 *	),
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the study, a positive integer",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_2_data_tag",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the tagged dataset",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_12",
 *	@OA\Property(
 *		property="flow_tag",
 *		ref="#/components/schemas/inline_response_200_12_flow_tag",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_13",
 *	@OA\Property(
 *		property="flow_untag",
 *		ref="#/components/schemas/inline_response_200_13_flow_untag",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_10",
 *	@OA\Property(
 *		property="flow_exists",
 *		ref="#/components/schemas/inline_response_200_10_flow_exists",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_23_upload_flow",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the run with the trace, a positive integer",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_16",
 *	@OA\Property(
 *		property="flow_untag",
 *		ref="#/components/schemas/inline_response_200_16_flow_untag",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_17",
 *	@OA\Property(
 *		property="data_delete",
 *		ref="#/components/schemas/inline_response_200_17_data_delete",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_14",
 *	@OA\Property(
 *		property="study_delete",
 *		ref="#/components/schemas/inline_response_200_14_study_delete",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_15",
 *	@OA\Property(
 *		property="flow_tag",
 *		ref="#/components/schemas/inline_response_200_15_flow_tag",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_18",
 *	@OA\Property(
 *		property="upload_flow",
 *		ref="#/components/schemas/inline_response_200_18_upload_flow",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_19",
 *	@OA\Property(
 *		property="run_tag",
 *		ref="#/components/schemas/inline_response_200_19_run_tag",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="EvaluationRequest_evaluation_request",
 *	@OA\Property(
 *		property="run",
 *		ref="#/components/schemas/EvaluationRequest_evaluation_request_run",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Run",
 *	type="object",
 *	@OA\Property(
 *		property="run_description",
 *		ref="#/components/schemas/Run_run_description",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_6_task_tag",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the tagged task",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="RunList",
 *	type="object",
 *	@OA\Property(
 *		property="runs",
 *		ref="#/components/schemas/RunList_runs",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_17_data_delete",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the deleted run, a positive integer",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Task_task_description_input",
 *	@OA\Property(
 *		property="data_set",
 *		ref="#/components/schemas/Task_task_description_data_set",
 *	),
 *	@OA\Property(
 *		property="cost_matrix",
 *		type="array",
 *		description="The cost matrix, indicating the costs for each type of misclassification",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the input, e.g. source_data",
 *	),
 *	@OA\Property(
 *		property="evaluation_measures",
 *		ref="#/components/schemas/Task_task_description_evaluation_measures",
 *	),
 *	@OA\Property(
 *		property="estimation_procedure",
 *		ref="#/components/schemas/Task_task_description_estimation_procedure",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="UserList",
 *	type="object",
 *	@OA\Property(
 *		property="users",
 *		ref="#/components/schemas/UserList_users",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Study_study_runs",
 *	@OA\Property(
 *		property="run_id",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="DataFeatures_data_features_feature",
 *	@OA\Property(
 *		property="index",
 *		type="string",
 *		description="Feature index",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="Feature name",
 *	),
 *	@OA\Property(
 *		property="data_type",
 *		type="string",
 *		description="Feature data type",
 *	),
 *	@OA\Property(
 *		property="is_target",
 *		type="string",
 *		description="Whether this feature is seen as a target feature",
 *	),
 *	@OA\Property(
 *		property="is_ignore",
 *		type="string",
 *		description="Whether this feature should be ignored in modelling (e.g. every value is unique)",
 *	),
 *	@OA\Property(
 *		property="is_row_identifier",
 *		type="string",
 *		description="Whether this feature is a row identifier",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_21_upload_flow",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the evaluated run, a positive integer",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="TaskType",
 *	type="object",
 *	@OA\Property(
 *		property="description",
 *		type="string",
 *		description="A description of the task type",
 *	),
 *	@OA\Property(
 *		property="date",
 *		type="string",
 *		description="The date when the task type was created",
 *	),
 *	@OA\Property(
 *		property="output",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="contributor",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="input",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the task type, a positive integer",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the task type, e.g. Supervised Classification",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Run_run_description_output_data_file",
 *	@OA\Property(
 *		property="did",
 *		type="string",
 *		description="The id of the uploaded file",
 *	),
 *	@OA\Property(
 *		property="file_id",
 *		type="string",
 *		description="The reference id of the uploaded file, for downloading afterward",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the uploaded file (e.g., description, predictions, model,...)",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="TaskType_input",
 *	@OA\Property(
 *		property="data_set",
 *		ref="#/components/schemas/Task_task_description_data_set",
 *	),
 *	@OA\Property(
 *		property="cost_matrix",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the input, e.g. source_data",
 *	),
 *	@OA\Property(
 *		property="evaluation_measures",
 *		ref="#/components/schemas/Task_task_description_evaluation_measures",
 *	),
 *	@OA\Property(
 *		property="estimation_procedure",
 *		ref="#/components/schemas/Task_task_description_estimation_procedure",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Run_run_description_output_data",
 *	@OA\Property(
 *		property="evaluation",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="file",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_3_data_untag",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the untagged dataset",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Task_task_description_output",
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the output, e.g. predictions",
 *	),
 *	@OA\Property(
 *		property="predictions",
 *		ref="#/components/schemas/Task_task_description_predictions",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="DataQualityList",
 *	type="object",
 *	@OA\Property(
 *		property="data_qualities_list",
 *		ref="#/components/schemas/DataQualityList_data_qualities_list",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="DataUnprocessed_data_unprocessed",
 *	@OA\Property(
 *		property="dataset",
 *		ref="#/components/schemas/DataUnprocessed_data_unprocessed_dataset",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Study",
 *	type="object",
 *	@OA\Property(
 *		property="study",
 *		ref="#/components/schemas/Study_study",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="DataList_data",
 *	@OA\Property(
 *		property="dataset",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="UserList_users_user",
 *	@OA\Property(
 *		property="username",
 *		type="string",
 *		description="The full user name",
 *	),
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="The user ID",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="TaskType_output",
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the output, e.g. predictions",
 *	),
 *	@OA\Property(
 *		property="predictions",
 *		ref="#/components/schemas/TaskType_predictions",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="RunList_runs_run",
 *	@OA\Property(
 *		property="task_id",
 *		type="string",
 *		description="The ID of the task solved by this run",
 *	),
 *	@OA\Property(
 *		property="run_id",
 *		type="string",
 *		description="The run ID",
 *	),
 *	@OA\Property(
 *		property="error_message",
 *		type="string",
 *		description="Error message generated by the run (if any)",
 *	),
 *	@OA\Property(
 *		property="setup_id",
 *		type="string",
 *		description="Ignore (internal representation of the parameter setting)",
 *	),
 *	@OA\Property(
 *		property="uploader",
 *		type="string",
 *		description="The ID of the person uploading this run",
 *	),
 *	@OA\Property(
 *		property="flow_id",
 *		type="string",
 *		description="The ID of the flow used in this run",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="DataFeatures_data_features",
 *	@OA\Property(
 *		property="feature",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="DataQualities_data_qualities_quality",
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the dataset quality measures",
 *	),
 *	@OA\Property(
 *		property="value",
 *		type="string",
 *		description="The value for this dataset",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_12_flow_tag",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the tagged flow",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_8_flow_delete",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the deleted flow, a positive integer",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="DataQualities_data_qualities",
 *	@OA\Property(
 *		property="quality",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="EvaluationRequest",
 *	type="object",
 *	@OA\Property(
 *		property="evaluation_request",
 *		ref="#/components/schemas/EvaluationRequest_evaluation_request",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_18_upload_flow",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the uploaded run, a positive integer",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="SetupList",
 *	type="object",
 *	@OA\Property(
 *		property="setups",
 *		ref="#/components/schemas/SetupList_setups",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="TaskList",
 *	type="object",
 *	@OA\Property(
 *		property="task",
 *		ref="#/components/schemas/TaskList_task",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_4_task_delete",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the deleted task, a positive integer",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Task_task_description_data_set",
 *	@OA\Property(
 *		property="data_set_id",
 *		type="string",
 *		description="The id of the dataset",
 *	),
 *	@OA\Property(
 *		property="target_feature",
 *		type="string",
 *		description="The name of the target feature for this task",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="EvaluationList",
 *	type="object",
 *	@OA\Property(
 *		property="evaluations",
 *		ref="#/components/schemas/EvaluationList_evaluations",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Run_run_description",
 *	@OA\Property(
 *		property="setup_string",
 *		type="string",
 *		description="Configuration of the flow as a string, to be interpreted by the flow, its library, or command line interface.",
 *	),
 *	@OA\Property(
 *		property="task_type",
 *		type="string",
 *		description="The type of task solved by this run (e.g., classification)",
 *	),
 *	@OA\Property(
 *		property="task_id",
 *		type="string",
 *		description="The id of the task solved by this run",
 *	),
 *	@OA\Property(
 *		property="task_evaluation_measure",
 *		type="string",
 *		description="The evaluation measure that is supposed to be optimized in the task, if any",
 *	),
 *	@OA\Property(
 *		property="uploader_name",
 *		type="string",
 *		description="The name of the uploader of the run",
 *	),
 *	@OA\Property(
 *		property="input_data",
 *		ref="#/components/schemas/Run_run_description_input_data",
 *	),
 *	@OA\Property(
 *		property="tag",
 *		type="array",
 *		description="Tags added by OpenML users. Includes study tags in the form `study_1`",
 *	),
 *	@OA\Property(
 *		property="output_data",
 *		ref="#/components/schemas/Run_run_description_output_data",
 *	),
 *	@OA\Property(
 *		property="uploader",
 *		type="string",
 *		description="The uploader of the run",
 *	),
 *	@OA\Property(
 *		property="flow_id",
 *		type="string",
 *		description="The id of the flow used in this run",
 *	),
 *	@OA\Property(
 *		property="flow_name",
 *		type="string",
 *		description="The name of the flow used in this run",
 *	),
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the run, a positive integer",
 *	),
 *	@OA\Property(
 *		property="parameter_setting",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="FlowList",
 *	type="object",
 *	@OA\Property(
 *		property="flows",
 *		ref="#/components/schemas/FlowList_flows",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_19_run_tag",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the tagged run",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_8",
 *	@OA\Property(
 *		property="flow_delete",
 *		ref="#/components/schemas/inline_response_200_8_flow_delete",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_9",
 *	@OA\Property(
 *		property="upload_flow",
 *		ref="#/components/schemas/inline_response_200_9_upload_flow",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Study_study_data",
 *	@OA\Property(
 *		property="data_id",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_1",
 *	@OA\Property(
 *		property="upload_data_set",
 *		ref="#/components/schemas/inline_response_200_1_upload_data_set",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_2",
 *	@OA\Property(
 *		property="data_tag",
 *		ref="#/components/schemas/inline_response_200_2_data_tag",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_3",
 *	@OA\Property(
 *		property="data_untag",
 *		ref="#/components/schemas/inline_response_200_3_data_untag",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_4",
 *	@OA\Property(
 *		property="task_delete",
 *		ref="#/components/schemas/inline_response_200_4_task_delete",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_5",
 *	@OA\Property(
 *		property="upload_task",
 *		ref="#/components/schemas/inline_response_200_5_upload_task",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_6",
 *	@OA\Property(
 *		property="task_tag",
 *		ref="#/components/schemas/inline_response_200_6_task_tag",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_7",
 *	@OA\Property(
 *		property="task_untag",
 *		ref="#/components/schemas/inline_response_200_7_task_untag",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_data_delete",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the deleted dataset, a positive integer",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="RunTrace_trace",
 *	@OA\Property(
 *		property="trace_iteration",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="run_id",
 *		type="string",
 *		description="run ID",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_7_task_untag",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the untagged task",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Data",
 *	type="object",
 *	@OA\Property(
 *		property="data_set_description",
 *		ref="#/components/schemas/Data_data_set_description",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Task_task_description_evaluation_measures",
 *	@OA\Property(
 *		property="evaluation_measure",
 *		type="string",
 *		description="The evaluation measure to optimize in this task",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="SetupList_setups_parameter",
 *	@OA\Property(
 *		property="default_value",
 *		type="string",
 *		description="The parameter's default value",
 *	),
 *	@OA\Property(
 *		property="data_type",
 *		type="string",
 *		description="The parameter's data type",
 *	),
 *	@OA\Property(
 *		property="value",
 *		type="string",
 *		description="The parameter value in this setup",
 *	),
 *	@OA\Property(
 *		property="parameter_name",
 *		type="string",
 *		description="The parameter's short name",
 *	),
 *	@OA\Property(
 *		property="full_name",
 *		type="string",
 *		description="The parameter's full name",
 *	),
 *	@OA\Property(
 *		property="flow_id",
 *		type="string",
 *		description="The (sub)flow ID",
 *	),
 *	@OA\Property(
 *		property="flow_name",
 *		type="string",
 *		description="The (sub)flow name",
 *	),
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="The parameter ID",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="TaskList_task_input",
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the input",
 *	),
 *	@OA\Property(
 *		property="value",
 *		type="string",
 *		description="The value of the input",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="StudyList_study_list",
 *	@OA\Property(
 *		property="study",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Study_study_tag",
 *	@OA\Property(
 *		property="write_access",
 *		type="string",
 *		description="The write access level of the study (e.g. public)",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the study (e.g. study_1)",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Flow",
 *	type="object",
 *	@OA\Property(
 *		property="flow_description",
 *		ref="#/components/schemas/Flow_flow_description",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Run_run_description_parameter_setting",
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the parameter",
 *	),
 *	@OA\Property(
 *		property="value",
 *		type="string",
 *		description="The value of the parameter used",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="EvaluationRequest_evaluation_request_run",
 *	@OA\Property(
 *		property="setup_id",
 *		type="string",
 *		description="ID of the setup, a positive integer",
 *	),
 *	@OA\Property(
 *		property="upload_time",
 *		type="string",
 *		description="The datetime that the dataset was uploaded, format yyyy-MM-dd HH:mm:ss",
 *	),
 *	@OA\Property(
 *		property="uploader",
 *		type="string",
 *		description="ID of the uploader, a positive integer",
 *	),
 *	@OA\Property(
 *		property="task_id",
 *		type="string",
 *		description="ID of the task, a positive integer",
 *	),
 *	@OA\Property(
 *		property="run_id",
 *		type="string",
 *		description="ID of the run, a positive integer",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Error",
 *	type="object",
 *	@OA\Property(
 *		property="message",
 *		type="string",
 *	),
 *	@OA\Property(
 *		property="code",
 *		type="integer",
 *	),
 *	@OA\Property(
 *		property="additional_message",
 *		type="string",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_23",
 *	@OA\Property(
 *		property="upload_flow",
 *		ref="#/components/schemas/inline_response_200_23_upload_flow",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_22",
 *	@OA\Property(
 *		property="run_reset",
 *		ref="#/components/schemas/inline_response_200_21_upload_flow",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_21",
 *	@OA\Property(
 *		property="upload_flow",
 *		ref="#/components/schemas/inline_response_200_21_upload_flow",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_20",
 *	@OA\Property(
 *		property="run_untag",
 *		ref="#/components/schemas/inline_response_200_20_run_untag",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_27",
 *	@OA\Property(
 *		property="upload_study",
 *		ref="#/components/schemas/inline_response_200_26_study_attach",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_26",
 *	@OA\Property(
 *		property="study_attach",
 *		ref="#/components/schemas/inline_response_200_26_study_attach",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_25",
 *	@OA\Property(
 *		property="upload_study",
 *		ref="#/components/schemas/inline_response_200_25_upload_study",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_24",
 *	@OA\Property(
 *		property="study_delete",
 *		ref="#/components/schemas/inline_response_200_24_study_delete",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="EstimationProcedureList_estimationprocedures_estimationprocedure",
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The estimation procedure name, e.g. '10 fold Crossvalidation'",
 *	),
 *	@OA\Property(
 *		property="folds",
 *		type="string",
 *		description="The number of cross-validation folds, e.g. '10'",
 *	),
 *	@OA\Property(
 *		property="stratified_sampling",
 *		type="string",
 *		description="Whether or not the sampling is stratified, 'true' or 'false'",
 *	),
 *	@OA\Property(
 *		property="ttid",
 *		type="string",
 *		description="The task type ID",
 *	),
 *	@OA\Property(
 *		property="repeats",
 *		type="string",
 *		description="The number of repeats, e.g. '10'",
 *	),
 *	@OA\Property(
 *		property="type",
 *		type="string",
 *		description="The estimation procedure type, e.g. 'crossvalidation'",
 *	),
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="The estimation procedure ID",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="TaskTypeList_task_types",
 *	@OA\Property(
 *		property="task_type",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="TaskList_task_task",
 *	@OA\Property(
 *		property="status",
 *		type="string",
 *		description="The status of the source dataset, active, in_preparation, or deactivated",
 *	),
 *	@OA\Property(
 *		property="task_type",
 *		type="string",
 *		description="The type of task (e.g. Supervised Classificationr)",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the source dataset",
 *	),
 *	@OA\Property(
 *		property="task_id",
 *		type="string",
 *		description="The ID of the task",
 *	),
 *	@OA\Property(
 *		property="format",
 *		type="string",
 *		description="The format of the source dataset",
 *	),
 *	@OA\Property(
 *		property="did",
 *		type="string",
 *		description="The id of the source dataset",
 *	),
 *	@OA\Property(
 *		property="tag",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="input",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="quality",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_20_run_untag",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the untagged run",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_11",
 *	@OA\Property(
 *		property="flow_owned",
 *		ref="#/components/schemas/inline_response_200_11_flow_owned",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="StudyList",
 *	type="object",
 *	@OA\Property(
 *		property="study_list",
 *		ref="#/components/schemas/StudyList_study_list",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Study_study",
 *	@OA\Property(
 *		property="runs",
 *		ref="#/components/schemas/Study_study_runs",
 *	),
 *	@OA\Property(
 *		property="tasks",
 *		ref="#/components/schemas/Study_study_tasks",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the study",
 *	),
 *	@OA\Property(
 *		property="creator",
 *		type="string",
 *		description="A comma-separated list of the study creators",
 *	),
 *	@OA\Property(
 *		property="flows",
 *		ref="#/components/schemas/Study_study_flows",
 *	),
 *	@OA\Property(
 *		property="creation_date",
 *		type="string",
 *		description="The datetime that the dataset was uploaded, format yyyy-MM-dd HH:mm:ss",
 *	),
 *	@OA\Property(
 *		property="alias",
 *		type="string",
 *		description="The alias of the study",
 *	),
 *	@OA\Property(
 *		property="tag",
 *		ref="#/components/schemas/Study_study_tag",
 *	),
 *	@OA\Property(
 *		property="main_entity_type",
 *		type="string",
 *		description="The type of entity collected in the study (e.g. task or run)",
 *	),
 *	@OA\Property(
 *		property="data",
 *		ref="#/components/schemas/Study_study_data",
 *	),
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="The ID of the study",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_11_flow_owned",
 *	@OA\Property(
 *		property="id",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_25_upload_study",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the uploaded study, a positive integer",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="EvaluationList_evaluations_evaluation",
 *	@OA\Property(
 *		property="function",
 *		type="string",
 *		description="The name of the evaluation function",
 *	),
 *	@OA\Property(
 *		property="task_id",
 *		type="string",
 *		description="The ID of the tasks solved by this run",
 *	),
 *	@OA\Property(
 *		property="run_id",
 *		type="string",
 *		description="The run ID",
 *	),
 *	@OA\Property(
 *		property="array_data",
 *		type="string",
 *		description="For structured evaluation measures, an array of evaluation values (e.g. per-class predictions, evaluation matrices,...)",
 *	),
 *	@OA\Property(
 *		property="value",
 *		type="string",
 *		description="The outcome of the evaluation",
 *	),
 *	@OA\Property(
 *		property="flow_id",
 *		type="string",
 *		description="The ID of the flow used by this run",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="EstimationProcedureList",
 *	type="object",
 *	@OA\Property(
 *		property="estimationprocedures",
 *		ref="#/components/schemas/EstimationProcedureList_estimationprocedures",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="DataQualityList_data_qualities_list",
 *	@OA\Property(
 *		property="quality",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Study_study_flows",
 *	@OA\Property(
 *		property="flow_id",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="StudyList_study_list_study",
 *	@OA\Property(
 *		property="alias",
 *		type="string",
 *		description="The alias of the study",
 *	),
 *	@OA\Property(
 *		property="creation_date",
 *		type="string",
 *		description="The datetime that the dataset was uploaded, format yyyy-MM-dd HH:mm:ss",
 *	),
 *	@OA\Property(
 *		property="creator",
 *		type="string",
 *		description="A comma-separated list of the study creators",
 *	),
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="The ID of the study",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the study",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Run_run_description_input_data",
 *	@OA\Property(
 *		property="dataset",
 *		ref="#/components/schemas/Run_run_description_input_data_dataset",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="TaskTypeList_task_types_task_type",
 *	@OA\Property(
 *		property="description",
 *		type="string",
 *		description="A description of the task type",
 *	),
 *	@OA\Property(
 *		property="creator",
 *		type="string",
 *		description="A comma-separated list of the task type creators",
 *	),
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="The ID of the task type",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the task type",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="EvaluationMeasureList_evaluation_measures",
 *	@OA\Property(
 *		property="measures",
 *		ref="#/components/schemas/EvaluationMeasureList_evaluation_measures_measures",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="TaskType_predictions",
 *	@OA\Property(
 *		property="feature",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="format",
 *		type="string",
 *		description="The format of the predictions, e.g. ARFF",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Flow_flow_description_parameter",
 *	@OA\Property(
 *		property="default_value",
 *		type="string",
 *		description="The default value of the parameter",
 *	),
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the parameter",
 *	),
 *	@OA\Property(
 *		property="data_type",
 *		type="string",
 *		description="The data type of the parameter",
 *	),
 *	@OA\Property(
 *		property="description",
 *		type="string",
 *		description="A description of the parameter",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="RunTrace_trace_trace_iteration",
 *	@OA\Property(
 *		property="setup_string",
 *		type="string",
 *		description="A JSON representation of the setup (configuration)",
 *	),
 *	@OA\Property(
 *		property="repeat",
 *		type="string",
 *		description="The number of the repeat in the outer cross-valudation",
 *	),
 *	@OA\Property(
 *		property="selected",
 *		type="string",
 *		description="Whether this setup was selected as the best one (true or false)",
 *	),
 *	@OA\Property(
 *		property="iteration",
 *		type="string",
 *		description="A number of the optimization iteration",
 *	),
 *	@OA\Property(
 *		property="fold",
 *		type="string",
 *		description="The number of the fold in the inner cross-validation",
 *	),
 *	@OA\Property(
 *		property="evaluation",
 *		type="string",
 *		description="The evaluation score of the setup",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="EvaluationMeasureList",
 *	type="object",
 *	@OA\Property(
 *		property="evaluation_measures",
 *		ref="#/components/schemas/EvaluationMeasureList_evaluation_measures",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="SetupList_setups",
 *	@OA\Property(
 *		property="setup",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="TaskList_task",
 *	@OA\Property(
 *		property="task",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="SetupList_setups_setup",
 *	@OA\Property(
 *		property="setup_id",
 *		type="string",
 *		description="The setup ID",
 *	),
 *	@OA\Property(
 *		property="parameter",
 *		type="array",
 *	),
 *	@OA\Property(
 *		property="flow_id",
 *		type="string",
 *		description="The ID of the flow used by this run",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Task_task_description_estimation_procedure_parameter",
 *	@OA\Property(
 *		property="name",
 *		type="string",
 *		description="The name of the parameter",
 *	),
 *	@OA\Property(
 *		property="value",
 *		type="string",
 *		description="The value of the parameter",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="RunList_runs",
 *	@OA\Property(
 *		property="run",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Study_study_tasks",
 *	@OA\Property(
 *		property="task_id",
 *		type="array",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="inline_response_200_1_upload_data_set",
 *	@OA\Property(
 *		property="id",
 *		type="string",
 *		description="ID of the uploaded dataset, a positive integer",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="Setup_setup_parameters_parameter_setting",
 *	@OA\Property(
 *		property="default_value",
 *		type="string",
 *		description="The default value of the parameter used",
 *	),
 *	@OA\Property(
 *		property="value",
 *		type="string",
 *		description="The value of the parameter used",
 *	),
 *	@OA\Property(
 *		property="data_type",
 *		type="string",
 *		description="The data type of the hyperparameter value",
 *	),
 *	@OA\Property(
 *		property="full_name",
 *		type="string",
 *		description="The full name of the hyperparameter",
 *	),
 *	@OA\Property(
 *		property="parameter_name",
 *		type="string",
 *		description="The short name of the hyperparameter",
 *	),
 *)
 */

/**
 *@OA\Schema(
 *	schema="DataQualities",
 *	type="object",
 *	@OA\Property(
 *		property="data_qualities",
 *		ref="#/components/schemas/DataQualities_data_qualities",
 *	),
 *)
 */

