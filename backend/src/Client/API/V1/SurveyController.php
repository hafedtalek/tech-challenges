<?php

namespace Backend\src\Client\API\V1;

use Backend\src\Client\Resources\SurveyCollection;
use Backend\src\Client\Repository\SurveyRepository;
use Backend\src\Client\Resources\Survey as SurveyResource;

/**
 * @Resource("Surveys")
 * @Controller(prefix="v1")
 */
class SurveyController 
{
    protected $Survey;

    
    public function __construct(SurveyRepository $Survey)
    {
        $this->Survey = $Survey;
    }

    /**
     * @SWG\Get(
     *     path="/api/v1/Client/Surveys",
     *     description="Returns all Surveys.",
     *     operationId="api.v1.Surveys",
     *     produces={"application/json"},
     *     tags={"Survey"},
     *
     *      @SWG\Response(
     *          response=200,
     *          description="the requested page of the index..",
     *          @SWG\Schema(
     *              required={"data"},
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Survey"),
     *              )
     *          ),
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    public function index()
    {
        $Surveys = $this->Survey->getAll();

        return new SurveyCollection($Surveys);
    }

    /**
     * @SWG\Post(
     *     path="/api/v1/Client/Surveys",
     *     description="Returns Survey by params.",
     *     operationId="api.v1.Surveys",
     *     produces={"application/json"},
     *     tags={"Survey"},
     *     @SWG\Parameter(
     *          name="options",
     *          required=true,
     *          in="formData",
     *          description="the option of the survey",
     *          type="array"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="the requested page of the index..",
     *          @SWG\Schema(
     *              required={"data"},
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Survey"),
     *              )
     *          ),
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    public function post(Request $request)
    {
        $Surveys = $this->Survey->getAllWhere($request->option);

        return new SkillResource($Surveys);
    }