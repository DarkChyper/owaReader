<?php

namespace App\Entity;

use App\Repository\HourRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HourRepository::class)]
class Hour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Weather::class, inversedBy: 'hours')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Weather $weather;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $dateTime;

    #[ORM\Column(type: 'float')]
    private ?float $temperature;

    #[ORM\Column(type: 'float')]
    private ?float $fellsLike;

    /**
     * Atmospheric pressure on the sea level, hPa
     */
    #[ORM\Column(type: 'integer')]
    private ?int $pressure;

    /**
     * Humidity, %
     */
    #[ORM\Column(type: 'integer')]
    private ?int $humidity;

    #[ORM\Column(type: 'float')]
    private ?float $uvi;

    /**
     * Cloudiness, %
     */
    #[ORM\Column(type: 'integer')]
    private ?int $clouds;

    /**
     * Average visibility, metres. The maximum value of the visibility is 10km
     */
    #[ORM\Column(type: 'integer')]
    private ?int $visibility;

    #[ORM\Column(type: 'float')]
    private ?float $windSpeed;

    /**
     * Wind direction, degrees
     */
    #[ORM\Column(type: 'integer')]
    private ?int $windDegree;

    /**
     * Probability of precipitation. The values of the parameter vary between 0 and 1, where 0 is equal to 0%, 1 is equal to 100%
     */
    #[ORM\Column(type: 'float')]
    private ?float $pop;

    /**
     * Rain volume for last hour, mm
     */
    #[ORM\Column(type: 'float')]
    private float $rain;

    /**
     * Snow volume for last hour, mm
     */
    #[ORM\Column(type: 'float')]
    private float $snow;

    #[ORM\OneToOne(targetEntity: Summary::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Summary $summary;

    public function __construct()
    {
        $this->rain = 0.0;
        $this->snow = 0.0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeather(): ?Weather
    {
        return $this->weather;
    }

    public function setWeather(?Weather $weather): self
    {
        $this->weather = $weather;

        return $this;
    }

    public function getDateTime(): ?\DateTimeInterface
    {
        return $this->dateTime;
    }

    public function setDateTime(\DateTimeInterface $dateTime): self
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getFellsLike(): ?float
    {
        return $this->fellsLike;
    }

    public function setFellsLike(float $fellsLike): self
    {
        $this->fellsLike = $fellsLike;

        return $this;
    }

    public function getPressure(): ?int
    {
        return $this->pressure;
    }

    public function setPressure(int $pressure): self
    {
        $this->pressure = $pressure;

        return $this;
    }

    public function getHumidity(): ?int
    {
        return $this->humidity;
    }

    public function setHumidity(?int $humidity): void
    {
        $this->humidity = $humidity;
    }

    public function getUvi(): ?float
    {
        return $this->uvi;
    }

    public function setUvi(float $uvi): self
    {
        $this->uvi = $uvi;

        return $this;
    }

    public function getClouds(): ?int
    {
        return $this->clouds;
    }

    public function setClouds(int $clouds): self
    {
        $this->clouds = $clouds;

        return $this;
    }

    public function getVisibility(): ?int
    {
        return $this->visibility;
    }

    public function setVisibility(int $visibility): self
    {
        $this->visibility = $visibility;

        return $this;
    }

    public function getWindSpeed(): ?float
    {
        return $this->windSpeed;
    }

    public function setWindSpeed(float $windSpeed): self
    {
        $this->windSpeed = $windSpeed;

        return $this;
    }

    public function getWindDegree(): ?int
    {
        return $this->windDegree;
    }

    public function setWindDegree(int $windDegree): self
    {
        $this->windDegree = $windDegree;

        return $this;
    }

    public function getPop(): ?float
    {
        return $this->pop;
    }

    public function setPop(float $pop): self
    {
        $this->pop = $pop;

        return $this;
    }

    public function getRain(): ?float
    {
        return $this->rain;
    }

    public function setRain(float $rain): self
    {
        $this->rain = $rain;

        return $this;
    }

    public function getSnow(): ?float
    {
        return $this->snow;
    }

    public function setSnow(float $snow): self
    {
        $this->snow = $snow;

        return $this;
    }

    public function getSummary(): ?Summary
    {
        return $this->summary;
    }

    public function setSummary(Summary $summary): self
    {
        $this->summary = $summary;

        return $this;
    }
}
