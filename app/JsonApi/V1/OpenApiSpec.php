<?php

namespace App\JsonApi\V1;

/**
 *	@OA\Tag(
 *		name="ticket",
 *		description="Ticket related operations"
 *	)
 *
 *	@OA\Info(
 *		version="1.0",
 *		title="DoubleV Path Test API.",
 *		description="API with the specification JSON:API for the technical test of a DoubeV Partners ticket system.",
 *
 *		@OA\Contact(name="John Fredy Velasco Bareño", email="jovel882@gmail.com", url="https://github.com/jovel882/doubleV/")
 *	)
 *
 *	@OA\Server(
 *		url="http://doublev.test/api/v1",
 *		description="API server"
 *	)
 *
 *	@OA\SecurityScheme(
 *		securityScheme="AuthMethod",
 *		name="AuthMethod",
 *		type="oauth2",
 *		description="Para este ambiente de pruebas puede usar los siguiente: <h6>client_id='1'</h6><h6>client_secret='mFRn19FSwRoObbZleJ8k9009Ct5E4ipY850n8Cb4'</h6>",
 *
 *		@OA\Flow(
 *			tokenUrl="http://doublev.test/oauth/token",
 *			flow="clientCredentials",
 *			scopes={}
 *		)
 *	)
 */
class OpenApiSpec
{
}

/**
 *	@OA\Post(
 *		path="/tickets",
 *		summary="Adds a new ticket.",
 *		description="Adds a new ticket.",
 *		operationId="addTicket",
 *		tags={"ticket"},
 *
 *		@OA\Parameter(
 *			in="header",
 *			name="Authorization",
 *			description="Authorization header.(NOTE: This header is defined in this documentation for informational purposes for external use, and the value defined here will not affect this Swagger UI. If you want to change the value for this Swagger UI, adjust the 'authorizations'.)",
 *			required=true,
 *
 *			@OA\Schema(
 *				type="string",
 *				default="none",
 *				example="none",
 *			)
 *		),
 *
 *		@OA\Parameter(
 *			name="Content-Type",
 *			in="header",
 *			description="Content-Type header.",
 *			required=true,
 *
 *			@OA\Schema(
 *				type="string",
 *				default="application/vnd.api+json",
 *				example="application/vnd.api+json",
 *				enum={"application/vnd.api+json"},
 *			)
 *		),
 *
 *		@OA\Parameter(
 *			name="Accept",
 *			in="header",
 *			description="Accept header.",
 *			required=true,
 *
 *			@OA\Schema(
 *				type="string",
 *				default="application/vnd.api+json",
 *				example="application/vnd.api+json",
 *				enum={"application/vnd.api+json"},
 *			)
 *		),
 *
 *		@OA\RequestBody(
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *
 *				@OA\Schema(
 *
 *					required={"data"},
 *
 *					@OA\Property(
 *						property="data",
 *						type="object",
 *						required={"type","attributes"},
 *						@OA\Property(
 *							property="type",
 *							type="string",
 *							default="tickets",
 *							example="tickets",
 *							enum={"tickets"},
 *						),
 *						@OA\Property(
 *							property="attributes",
 *							type="object",
 *							required={"user","status"},
 *							@OA\Property(
 *								property="user",
 *								type="string"
 *							),
 *							@OA\Property(
 *								property="status",
 *								type="string",
 *								enum={"abierto", "cerrado"},
 *							),
 *						),
 *					),
 *					example={"data":{"type":"tickets","attributes":{"user":"John Velasco","status":"abierto"}}}
 *				)
 *			)
 *		),
 *
 *		@OA\Response(
 *			response=201,
 *			description="OK",
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *				example={"jsonapi":{"version":"1.0"},"links":{"self":"http://doublev.test/api/v1/tickets/104"},"data":{"type":"tickets","id":"104","attributes":{"user":"John Velasco7","status":"abierto","createdAt":"2023-06-19T05:30:04.000000Z","updatedAt":"2023-06-19T05:30:04.000000Z"},"links":{"self":"http://doublev.test/api/v1/tickets/104"}}},
 *			),
 *		),
 *
 *		@OA\Response(
 *			response=401,
 *			description="Authentication could not be achieved.",
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *				example={"jsonapi":{"version":"1.0"},"errors":{{"detail":"Unauthenticated.","status":"401","title":"Unauthorized"}}},
 *			),
 *		),
 *
 *		@OA\Response(
 *			response=422,
 *			description="It contains validation errors.",
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *				example={"jsonapi":{"version":"1.0"},"errors":{{"detail":"The user field is required.","source":{"pointer":"/data/attributes/user"},"status":"422","title":"Unprocessable Entity"},{"detail":"The selected status is invalid.","source":{"pointer":"/data/attributes/status"},"status":"422","title":"Unprocessable Entity"}}},
 *			),
 *		),
 *		security={
 *			{"AuthMethod": {}}
 *		},
 *	)
 */
class TicketAddEndpoint
{
}

/**
 *	@OA\Patch(
 *		path="/tickets/{ticketId}",
 *		summary="Update a new ticket.",
 *		description="Update a new ticket.",
 *		operationId="updateTicket",
 *		tags={"ticket"},
 *
 *		@OA\Parameter(
 *			in="header",
 *			name="Authorization",
 *			description="Authorization header.(NOTE: This header is defined in this documentation for informational purposes for external use, and the value defined here will not affect this Swagger UI. If you want to change the value for this Swagger UI, adjust the 'authorizations'.)",
 *			required=true,
 *
 *			@OA\Schema(
 *				type="string",
 *				default="none",
 *				example="none",
 *			)
 *		),
 *
 *		@OA\Parameter(
 *			name="Content-Type",
 *			in="header",
 *			description="Content-Type header.",
 *			required=true,
 *
 *			@OA\Schema(
 *				type="string",
 *				default="application/vnd.api+json",
 *				example="application/vnd.api+json",
 *				enum={"application/vnd.api+json"},
 *			)
 *		),
 *
 *		@OA\Parameter(
 *			name="Accept",
 *			in="header",
 *			description="Accept header.",
 *			required=true,
 *
 *			@OA\Schema(
 *				type="string",
 *				default="application/vnd.api+json",
 *				example="application/vnd.api+json",
 *				enum={"application/vnd.api+json"},
 *			)
 *		),
 *
 *		@OA\Parameter(
 *			name="ticketId",
 *			in="path",
 *			required=true,
 *			description="The id of the ticket to update",
 *			example =1,
 *
 *			@OA\Schema(
 *				type="integer"
 *			)
 *		),
 *
 *		@OA\RequestBody(
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *
 *				@OA\Schema(
 *
 *					required={"data"},
 *
 *					@OA\Property(
 *						property="data",
 *						type="object",
 *						required={"type","id"},
 *						@OA\Property(
 *							property="type",
 *							type="string",
 *							default="tickets",
 *							example="tickets",
 *							enum={"tickets"},
 *						),
 *						@OA\Property(
 *							property="id",
 *							type="integer",
 *							example=1,
 *						),
 *						@OA\Property(
 *							property="attributes",
 *							type="object",
 *							@OA\Property(
 *								property="user",
 *								type="string"
 *							),
 *							@OA\Property(
 *								property="status",
 *								type="string",
 *								enum={"abierto", "cerrado"},
 *							),
 *						),
 *					),
 *					example={"data":{"type":"tickets","id":"1","attributes":{"user":"JOHN Velasco2","status":"abierto"}}}
 *				)
 *			)
 *		),
 *
 *		@OA\Response(
 *			response=200,
 *			description="OK",
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *				example={"jsonapi":{"version":"1.0"},"links":{"self":"http://doublev.test/api/v1/tickets/1"},"data":{"type":"tickets","id":"1","attributes":{"user":"JOHN Velasco2","status":"abierto","createdAt":"2020-12-23T22:16:24.000000Z","updatedAt":"2023-06-20T20:21:54.000000Z"},"links":{"self":"http://doublev.test/api/v1/tickets/1"}}},
 *			),
 *		),
 *
 *		@OA\Response(
 *			response=401,
 *			description="Authentication could not be achieved.",
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *				example={"jsonapi":{"version":"1.0"},"errors":{{"detail":"Unauthenticated.","status":"401","title":"Unauthorized"}}},
 *			),
 *		),
 *
 *		@OA\Response(
 *			response=404,
 *			description="Not Found",
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *				example={"jsonapi":{"version":"1.0"},"errors":{{"status":"404","title":"Not Found"}}},
 *			),
 *		),
 *
 *		@OA\Response(
 *			response=422,
 *			description="It contains validation errors.",
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *				example={"jsonapi":{"version":"1.0"},"errors":{{"detail":"The user field is required.","source":{"pointer":"/data/attributes/user"},"status":"422","title":"Unprocessable Entity"},{"detail":"The selected status is invalid.","source":{"pointer":"/data/attributes/status"},"status":"422","title":"Unprocessable Entity"}}},
 *			),
 *		),
 *		security={
 *			{"AuthMethod": {}}
 *		},
 *	)
 */
class TicketUpdateEndpoint
{
}

/**
 *	@OA\Get(
 *		path="/tickets/{ticketId}",
 *		summary="Info for a specific ticket.",
 *		description="Info for a specific ticket.",
 *		operationId="showTicketById",
 *		tags={"ticket"},
 *
 *		@OA\Parameter(
 *			in="header",
 *			name="Authorization",
 *			description="Authorization header.(NOTE: This header is defined in this documentation for informational purposes for external use, and the value defined here will not affect this Swagger UI. If you want to change the value for this Swagger UI, adjust the 'authorizations'.)",
 *			required=true,
 *
 *			@OA\Schema(
 *				type="string",
 *				default="none",
 *				example="none",
 *			)
 *		),
 *
 *		@OA\Parameter(
 *			name="Accept",
 *			in="header",
 *			description="Accept header.",
 *			required=true,
 *
 *			@OA\Schema(
 *				type="string",
 *				default="application/vnd.api+json",
 *				example="application/vnd.api+json",
 *				enum={"application/vnd.api+json"},
 *			)
 *		),
 *
 *		@OA\Parameter(
 *			name="ticketId",
 *			in="path",
 *			required=true,
 *			description="The id of the ticket to retrieve",
 *			example =1,
 *
 *			@OA\Schema(
 *				type="integer"
 *			)
 *		),
 *
 *		@OA\RequestBody(
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *			)
 *		),
 *
 *		@OA\Response(
 *			response=200,
 *			description="OK",
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *				example={"jsonapi":{"version":"1.0"},"links":{"self":"http://doublev.test/api/v1/tickets/1"},"data":{"type":"tickets","id":"1","attributes":{"user":"Maxime Kuhic","status":"abierto","createdAt":"2008-01-09T01:45:12.000000Z","updatedAt":"1988-07-22T10:16:56.000000Z"},"links":{"self":"http://doublev.test/api/v1/tickets/1"}}},
 *			),
 *		),
 *
 *		@OA\Response(
 *			response=401,
 *			description="Authentication could not be achieved.",
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *				example={"jsonapi":{"version":"1.0"},"errors":{{"detail":"Unauthenticated.","status":"401","title":"Unauthorized"}}},
 *			),
 *		),
 *
 *		@OA\Response(
 *			response=404,
 *			description="Not Found.",
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *				example={"jsonapi":{"version":"1.0"},"errors":{{"detail":"The route api/v1/tickets/1rewre could not be found.","status":"404","title":"Not Found"}}},
 *			),
 *		),
 *		security={
 *			{"AuthMethod": {}}
 *		},
 *	)
 */
class TicketShowByIdEndpoint
{
}

/**
 *	@OA\Delete(
 *		path="/tickets/{ticketId}",
 *		summary="Deletes a specific ticket.",
 *		description="Deletes a specific ticket.",
 *		operationId="deleteTicket",
 *		tags={"ticket"},
 *
 *		@OA\Parameter(
 *			in="header",
 *			name="Authorization",
 *			description="Authorization header.NOTE: This header is defined in this documentation for informational purposes for external use, and the value defined here will not affect this Swagger UI. If you want to change the value for this Swagger UI, adjust the 'authorizations'.",
 *			required=true,
 *
 *			@OA\Schema(
 *				type="string",
 *				default="none",
 *				example="none",
 *			)
 *		),
 *
 *		@OA\Parameter(
 *			name="Accept",
 *			in="header",
 *			description="Accept header",
 *			required=true,
 *
 *			@OA\Schema(
 *				type="string",
 *				default="application/vnd.api+json",
 *				example="application/vnd.api+json",
 *				enum={"application/vnd.api+json"},
 *			)
 *		),
 *
 *		@OA\Parameter(
 *			name="ticketId",
 *			in="path",
 *			required=true,
 *			description="The id of the ticket to delete",
 *			example =1,
 *
 *			@OA\Schema(
 *				type="integer"
 *			)
 *		),
 *
 *		@OA\RequestBody(
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *			)
 *		),
 *
 *		@OA\Response(
 *			response=204,
 *			description="OK",
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *				example="",
 *			),
 *		),
 *
 *		@OA\Response(
 *			response=401,
 *			description="Authentication could not be achieved.",
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *				example={"jsonapi":{"version":"1.0"},"errors":{{"detail":"Unauthenticated.","status":"401","title":"Unauthorized"}}},
 *			),
 *		),
 *
 *		@OA\Response(
 *			response=404,
 *			description="Not Found.",
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *				example={"jsonapi":{"version":"1.0"},"errors":{{"detail":"The route api/v1/tickets/1rewre could not be found.","status":"404","title":"Not Found"}}},
 *			),
 *		),
 *		security={
 *			{"AuthMethod": {}}
 *		},
 *	)
 */
class TicketDeleteEndpoint
{
}

/**
 *	@OA\Get(
 *		path="/tickets/",
 *		summary="Search ticket by values in the fields of id, status and user.",
 *		description="Search ticket by values in the fields of id, status and user.",
 *		operationId="searchTicket",
 *		tags={"ticket"},
 *
 *		@OA\Parameter(
 *			in="header",
 *			name="Authorization",
 *			description="Authorization header.NOTE: This header is defined in this documentation for informational purposes for external use, and the value defined here will not affect this Swagger UI. If you want to change the value for this Swagger UI, adjust the 'authorizations'.",
 *			required=true,
 *
 *			@OA\Schema(
 *				type="string",
 *				default="none",
 *				example="none",
 *			)
 *		),
 *
 *		@OA\Parameter(
 *			name="Accept",
 *			in="header",
 *			description="Accept header",
 *			required=true,
 *
 *			@OA\Schema(
 *				type="string",
 *				default="application/vnd.api+json",
 *				example="application/vnd.api+json",
 *				enum={"application/vnd.api+json"},
 *			)
 *		),
 *
 *		@OA\Parameter(
 *			name="page[number]",
 *			in="query",
 *			description="Page number to retrieve. (At least 1)",
 *
 *			@OA\Schema(
 *				type="integer",
 *				default=1,
 *				minimum=1,
 *			)
 *		),
 *
 *		@OA\Parameter(
 *			name="page[size]",
 *			in="query",
 *			description="Number of items per page. (Between 1 and 50)",
 *
 *			@OA\Schema(
 *				type="integer",
 *				default=50,
 *				minimum=1,
 *				maximum=50,
 *			)
 *		),
 *
 *		@OA\Parameter(
 *			name="filter[id][]",
 *			in="query",
 *			description="Filter by ticket id.",
 *			style="form",
 *			explode=true,
 *
 *			@OA\Schema(
 *				type="array",
 *
 *				@OA\Items(
 *					type="integer",
 *					default="",
 *				),
 *			)
 *		),
 *
 *		@OA\Parameter(
 *			name="filter[status][]",
 *			in="query",
 *			description="Filter by ticket status",
 *			style="form",
 *			explode=true,
 *
 *			@OA\Schema(
 *				type="array",
 *
 *				@OA\Items(
 *					type="string",
 *					enum={"abierto", "cerrado"},
 *				),
 *			)
 *		),
 *
 *		@OA\Parameter(
 *			name="filter[user][]",
 *			in="query",
 *			description="Filter by ticket user.",
 *			style="form",
 *			explode=true,
 *
 *			@OA\Schema(
 *				type="array",
 *
 *				@OA\Items(
 *					type="string",
 *					default="",
 *				),
 *			)
 *		),
 *
 *		@OA\RequestBody(
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *			)
 *		),
 *
 *		@OA\Response(
 *			response=200,
 *			description="OK",
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *
 *				@OA\Examples(example="Data is found.", value={"meta":{"page":{"currentPage":1,"from":1,"lastPage":11,"perPage":10,"to":10,"total":101}},"jsonapi":{"version":"1.0"},"links":{"first":"http://doublev.test/api/v1/tickets?page%5Bnumber%5D=1&page%5Bsize%5D=10","last":"http://doublev.test/api/v1/tickets?page%5Bnumber%5D=11&page%5Bsize%5D=10","next":"http://doublev.test/api/v1/tickets?page%5Bnumber%5D=2&page%5Bsize%5D=10"},"data":{{"type":"tickets","id":"3","attributes":{"user":"Prof. Lucy Barrows II","status":"abierto","createdAt":"1978-03-02T02:50:39.000000Z","updatedAt":"2004-08-07T05:04:54.000000Z"},"links":{"self":"http://doublev.test/api/v1/tickets/3"}},{"type":"tickets","id":"4","attributes":{"user":"Keagan McCullough DDS","status":"cerrado","createdAt":"2021-06-29T15:46:19.000000Z","updatedAt":"1971-02-22T03:31:45.000000Z"},"links":{"self":"http://doublev.test/api/v1/tickets/4"}},{"type":"tickets","id":"5","attributes":{"user":"Dr. Brant Swaniawski PhD","status":"cerrado","createdAt":"2019-04-10T04:59:30.000000Z","updatedAt":"1973-08-07T03:14:00.000000Z"},"links":{"self":"http://doublev.test/api/v1/tickets/5"}},{"type":"tickets","id":"6","attributes":{"user":"Devonte Bailey","status":"cerrado","createdAt":"2009-04-12T02:20:30.000000Z","updatedAt":"2004-08-27T21:04:57.000000Z"},"links":{"self":"http://doublev.test/api/v1/tickets/6"}},{"type":"tickets","id":"7","attributes":{"user":"Aryanna Berge","status":"cerrado","createdAt":"1977-05-05T02:57:34.000000Z","updatedAt":"1993-08-11T06:49:58.000000Z"},"links":{"self":"http://doublev.test/api/v1/tickets/7"}},{"type":"tickets","id":"8","attributes":{"user":"JOHN Velasco2","status":"abierto","createdAt":"1991-06-06T15:42:43.000000Z","updatedAt":"2023-06-20T22:25:27.000000Z"},"links":{"self":"http://doublev.test/api/v1/tickets/8"}},{"type":"tickets","id":"9","attributes":{"user":"Anita Howell Jr.","status":"cerrado","createdAt":"2007-06-15T21:22:27.000000Z","updatedAt":"1997-05-02T09:24:17.000000Z"},"links":{"self":"http://doublev.test/api/v1/tickets/9"}},{"type":"tickets","id":"10","attributes":{"user":"Jaqueline Bartell","status":"abierto","createdAt":"1971-10-16T17:18:53.000000Z","updatedAt":"1973-04-07T03:22:48.000000Z"},"links":{"self":"http://doublev.test/api/v1/tickets/10"}},{"type":"tickets","id":"11","attributes":{"user":"Alvina Thompson Jr.","status":"cerrado","createdAt":"2014-11-04T02:57:49.000000Z","updatedAt":"1972-04-03T16:53:49.000000Z"},"links":{"self":"http://doublev.test/api/v1/tickets/11"}},{"type":"tickets","id":"12","attributes":{"user":"Cameron Buckridge","status":"abierto","createdAt":"2016-12-25T15:58:38.000000Z","updatedAt":"1971-07-26T23:00:53.000000Z"},"links":{"self":"http://doublev.test/api/v1/tickets/12"}}}}, summary="Data is found."),
 *				@OA\Examples(example="No data found", value={"meta":{"page":{"currentPage":1,"from":0,"lastPage":1,"perPage":50,"to":0,"total":0}},"jsonapi":{"version":"1.0"},"links":{"first":"http://doublev.test/api/v1/tickets?filter%5Buser%5D%5B0%5D=ninguno&filter%5Bid%5D%5B0%5D=5465465465&page%5Bnumber%5D=1&page%5Bsize%5D=50","last":"http://doublev.test/api/v1/tickets?filter%5Buser%5D%5B0%5D=ninguno&filter%5Bid%5D%5B0%5D=5465465465&page%5Bnumber%5D=1&page%5Bsize%5D=50"},"data":{}}, summary="No data found"),
 *			),
 *		),
 *
 *		@OA\Response(
 *			response=401,
 *			description="Authentication could not be achieved.",
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *				example={"jsonapi":{"version":"1.0"},"errors":{{"detail":"Unauthenticated.","status":"401","title":"Unauthorized"}}},
 *			),
 *		),
 *
 *		@OA\Response(
 *			response=400,
 *			description="It contains validation errors.",
 *
 *			@OA\MediaType(
 *				mediaType="application/vnd.api+json",
 *				example={"jsonapi":{"version":"1.0"},"errors":{{"detail":"The selected filter.status.0 is invalid.","source":{"parameter":"filter.status.0"},"status":"400","title":"Invalid Query Parameter"}}},
 *			),
 *		),
 *		security={
 *			{"AuthMethod": {}}
 *		},
 *	)
 */
class TicketSearchEndpoint
{
}

/**
 *	@OA\Schema(
 *		schema="Ticket",
 *		title="Model Ticket",
 *		example={"id":1,"user":"John Velasco","status":"cerrado","createdAt":"2009-04-12T02:20:30.000000Z","updatedAt":"2004-08-27T21:04:57.000000Z"},
 *		required={"user", "status"},
 *
 *		@OA\Property(
 *			property="id",
 *			type="integer",
 *			example=1
 *		),
 *		@OA\Property(
 *			property="user",
 *			description="Name user",
 *			type="string",
 *			example="John Velasco"
 *		),
 *		@OA\Property(
 *			property="status",
 *			type="string",
 *			enum={"abierto","cerrado"},
 *			description="Status ticket",
 *		),
 *		@OA\Property(
 *			property="created_at",
 *			description="Date Format",
 *			type="string",
 *			example="2009-04-12T02:20:30.000000Z"
 *		),
 *		@OA\Property(
 *			property="updated_at",
 *			type="string",
 *			description="Date Format",
 *			example="2004-08-27T21:04:57.000000Z"
 *		),
 *	)
 */
class ResultSchema
{
}
